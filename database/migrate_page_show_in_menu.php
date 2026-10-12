<?php

declare(strict_types=1);

/**
 * php database/migrate_page_show_in_menu.php
 */
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/constants.php';

use App\Core\Database;

$db = Database::getInstance();
$exists = $db->fetch("SHOW COLUMNS FROM `pages` LIKE 'show_in_menu'");
if ($exists) {
    echo "Column show_in_menu already exists.\n";
} else {
    $db->query("ALTER TABLE `pages` ADD COLUMN `show_in_menu` TINYINT(1) NOT NULL DEFAULT 0 AFTER `status`");
    echo "Added pages.show_in_menu\n";
}

$db->query("UPDATE `pages` SET `show_in_menu` = 1 WHERE `slug` = 'about'");
echo "About page marked for header menu.\n";
echo "Done.\n";
