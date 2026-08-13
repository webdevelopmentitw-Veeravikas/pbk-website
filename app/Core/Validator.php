<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Input validation with common rules.
 */
final class Validator
{
    private array $data;
    private array $rules;
    private array $errors = [];
    private array $validated = [];

    public function __construct(array $data, array $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function passes(): bool
    {
        foreach ($this->rules as $field => $ruleString) {
            $rules = is_array($ruleString) ? $ruleString : explode('|', $ruleString);
            $value = $this->data[$field] ?? null;

            foreach ($rules as $rule) {
                $param = null;
                if (str_contains($rule, ':')) {
                    [$rule, $param] = explode(':', $rule, 2);
                }
                $method = 'rule' . str_replace(' ', '', ucwords(str_replace('_', ' ', $rule)));
                if (method_exists($this, $method)) {
                    $ok = $this->$method($field, $value, $param);
                    if (!$ok) {
                        break;
                    }
                }
            }

            if (!isset($this->errors[$field]) && array_key_exists($field, $this->data)) {
                $this->validated[$field] = $value;
            }
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function validated(): array
    {
        return $this->validated;
    }

    private function fail(string $field, string $message): bool
    {
        $this->errors[$field][] = $message;
        return false;
    }

    private function ruleRequired(string $field, mixed $value, ?string $param): bool
    {
        if ($value === null || $value === '' || (is_array($value) && count($value) === 0)) {
            return $this->fail($field, ucfirst(str_replace('_', ' ', $field)) . ' is required.');
        }
        return true;
    }

    private function ruleEmail(string $field, mixed $value, ?string $param): bool
    {
        if ($value !== null && $value !== '' && !filter_var((string) $value, FILTER_VALIDATE_EMAIL)) {
            return $this->fail($field, 'Invalid email address.');
        }
        return true;
    }

    private function ruleMin(string $field, mixed $value, ?string $param): bool
    {
        if ($value !== null && mb_strlen((string) $value) < (int) $param) {
            return $this->fail($field, "Minimum length is {$param}.");
        }
        return true;
    }

    private function ruleMax(string $field, mixed $value, ?string $param): bool
    {
        if ($value !== null && mb_strlen((string) $value) > (int) $param) {
            return $this->fail($field, "Maximum length is {$param}.");
        }
        return true;
    }

    private function ruleNumeric(string $field, mixed $value, ?string $param): bool
    {
        if ($value !== null && $value !== '' && !is_numeric($value)) {
            return $this->fail($field, 'Must be numeric.');
        }
        return true;
    }

    private function ruleIn(string $field, mixed $value, ?string $param): bool
    {
        $allowed = explode(',', (string) $param);
        if ($value !== null && $value !== '' && !in_array((string) $value, $allowed, true)) {
            return $this->fail($field, 'Invalid value.');
        }
        return true;
    }

    private function ruleConfirmed(string $field, mixed $value, ?string $param): bool
    {
        $other = $this->data[$field . '_confirmation'] ?? null;
        if ($value !== $other) {
            return $this->fail($field, 'Confirmation does not match.');
        }
        return true;
    }

    private function ruleUnique(string $field, mixed $value, ?string $param): bool
    {
        // unique:table,column,exceptId
        if ($value === null || $value === '') {
            return true;
        }
        $parts = explode(',', (string) $param);
        $table = $parts[0] ?? '';
        $column = $parts[1] ?? $field;
        $except = isset($parts[2]) ? (int) $parts[2] : null;

        $sql = "SELECT COUNT(*) AS cnt FROM `{$table}` WHERE `{$column}` = :val";
        $params = ['val' => $value];
        if ($except) {
            $sql .= ' AND id != :id';
            $params['id'] = $except;
        }
        $row = Database::getInstance()->fetch($sql, $params);
        if (($row['cnt'] ?? 0) > 0) {
            return $this->fail($field, 'Already exists.');
        }
        return true;
    }

    private function ruleNullable(string $field, mixed $value, ?string $param): bool
    {
        return true;
    }
}
