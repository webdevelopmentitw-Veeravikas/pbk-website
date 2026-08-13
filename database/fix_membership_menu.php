<?php
require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/config/constants.php';

$db = App\Core\Database::getInstance();
$db->query(
    "UPDATE menus SET title = :t WHERE url = '/membership' AND location = 'header'",
    ['t' => 'உறுப்பினர் சேர்க்கை']
);
$row = $db->fetch("SELECT id, title, url FROM menus WHERE url = '/membership'");
echo json_encode($row, JSON_UNESCAPED_UNICODE) . PHP_EOL;
