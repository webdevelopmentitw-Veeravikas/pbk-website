<?php

declare(strict_types=1);

/**
 * Convert existing membership IDs to PBK_XXXXXX format.
 * php database/migrate_membership_ids.php
 */

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/config/constants.php';

use App\Models\Member;

$model = new Member();
$rows = $model->query('SELECT id, membership_id FROM members ORDER BY id ASC');
$updated = 0;

foreach ($rows as $row) {
    $current = (string) ($row['membership_id'] ?? '');
    if (preg_match('/^PBK_[A-Z0-9]{6}$/', $current)) {
        echo "Skip #{$row['id']} {$current}\n";
        continue;
    }

    $newId = $model->generateMembershipId();
    $model->update((int) $row['id'], ['membership_id' => $newId]);
    echo "Updated #{$row['id']}: {$current} -> {$newId}\n";
    $updated++;
}

echo "Done. Updated {$updated} membership ID(s).\n";
