<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Newsletter extends Model
{
    protected string $table = 'newsletter';

    protected bool $timestamps = false;

    protected array $fillable = [
        'email',
        'name',
        'status',
        'subscribed_at',
        'unsubscribed_at',
    ];

    public function subscribe(string $email, ?string $name = null): int
    {
        $existing = $this->findBy('email', $email);
        $now = date('Y-m-d H:i:s');

        if ($existing) {
            $this->update((int) $existing['id'], [
                'status'           => 1,
                'name'             => $name ?? $existing['name'],
                'subscribed_at'    => $now,
                'unsubscribed_at'  => null,
            ]);

            return (int) $existing['id'];
        }

        return $this->create([
            'email'          => $email,
            'name'           => $name,
            'status'         => 1,
            'subscribed_at'  => $now,
        ]);
    }
}
