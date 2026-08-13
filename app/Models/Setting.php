<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Setting extends Model
{
    protected string $table = 'settings';

    protected array $fillable = [
        'group',
        'key',
        'value',
        'type',
    ];

    public function get(string $key, mixed $default = null): mixed
    {
        $row = $this->queryOne(
            'SELECT `value` FROM `settings` WHERE `key` = :key LIMIT 1',
            ['key' => $key]
        );

        if (!$row) {
            return $default;
        }

        return $row['value'];
    }

    public function set(string $key, mixed $value, string $group = 'general'): void
    {
        $existing = $this->queryOne(
            'SELECT `id` FROM `settings` WHERE `key` = :key LIMIT 1',
            ['key' => $key]
        );

        if ($existing) {
            $this->update((int) $existing['id'], [
                'value' => (string) $value,
                'group' => $group,
            ]);
            return;
        }

        $this->create([
            'key'   => $key,
            'value' => (string) $value,
            'group' => $group,
            'type'  => 'text',
        ]);
    }

    public function allGrouped(): array
    {
        $rows = $this->query('SELECT * FROM `settings` ORDER BY `group` ASC, `key` ASC');
        $grouped = [];

        foreach ($rows as $row) {
            $grouped[$row['group']][$row['key']] = $row;
        }

        return $grouped;
    }
}
