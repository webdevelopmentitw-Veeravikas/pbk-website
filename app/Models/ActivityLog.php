<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;
use App\Core\Request;

class ActivityLog extends Model
{
    protected string $table = 'activity_logs';

    protected bool $timestamps = false;

    protected array $fillable = [
        'user_id',
        'action',
        'description',
        'ip_address',
        'user_agent',
    ];

    public static function record(?int $userId, string $action, string $description): void
    {
        $request = new Request();
        $log = new self();

        $log->db()->insert('activity_logs', [
            'user_id'     => $userId,
            'action'      => $action,
            'description' => $description,
            'ip_address'  => $request->ip(),
            'user_agent'  => substr($request->userAgent(), 0, 255),
            'created_at'  => date('Y-m-d H:i:s'),
        ]);
    }

    public function latest(int $limit = 20): array
    {
        return $this->query(
            'SELECT al.*, u.name AS user_name, u.email AS user_email
             FROM `activity_logs` al
             LEFT JOIN `users` u ON u.id = al.user_id
             ORDER BY al.created_at DESC, al.id DESC
             LIMIT ' . (int) $limit
        );
    }
}
