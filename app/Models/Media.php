<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Media extends Model
{
    protected string $table = 'media';

    protected array $fillable = [
        'user_id',
        'folder',
        'filename',
        'original_name',
        'path',
        'thumb_path',
        'webp_path',
        'mime_type',
        'size',
        'width',
        'height',
        'alt_text',
    ];

    public function folders(): array
    {
        $rows = $this->query('SELECT DISTINCT `folder` FROM `media` ORDER BY `folder` ASC');

        return array_column($rows, 'folder');
    }

    public function search(string $q, ?string $folder = null): array
    {
        $term = trim($q);
        if ($term === '') {
            return [];
        }

        $params = ['q' => $term];
        $where = 'MATCH(`original_name`, `alt_text`) AGAINST (:q IN NATURAL LANGUAGE MODE)';

        if ($folder !== null && $folder !== '') {
            $where .= ' AND `folder` = :folder';
            $params['folder'] = $folder;
        }

        return $this->query(
            "SELECT * FROM `media` WHERE {$where} ORDER BY created_at DESC",
            $params
        );
    }
}
