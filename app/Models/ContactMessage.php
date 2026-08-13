<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;
use App\Core\Request;

class ContactMessage extends Model
{
    protected string $table = 'contact_messages';

    protected bool $timestamps = false;

    protected array $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'ip_address',
        'is_read',
    ];

    public function create(array $data): int
    {
        $data = $this->filterFillable($data);
        $data['created_at'] = date('Y-m-d H:i:s');

        if (!isset($data['ip_address'])) {
            $data['ip_address'] = (new Request())->ip();
        }

        return $this->db()->insert($this->table, $data);
    }
}
