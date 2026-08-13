<?php
require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/config/constants.php';

$row = App\Core\Database::getInstance()->fetch(
    "SELECT id, title, HEX(title) AS hx FROM menus WHERE url = '/membership'"
);
echo "TITLE=" . ($row['title'] ?? '') . PHP_EOL;
echo "HEX=" . ($row['hx'] ?? '') . PHP_EOL;
echo "HAS_TAMIL=" . (preg_match('/\p{Tamil}/u', (string) ($row['title'] ?? '')) ? 'yes' : 'no') . PHP_EOL;

$ctx = stream_context_create(['http' => ['header' => "Accept-Charset: utf-8\r\n"]]);
$html = @file_get_contents('http://localhost/p/', false, $ctx) ?: '';
if (preg_match('/href="[^"]*membership[^"]*"[^>]*>(.*?)<\/a>/u', $html, $m)) {
    echo "HTML_LINK=" . $m[1] . PHP_EOL;
    echo "HTML_HAS_TAMIL=" . (preg_match('/\p{Tamil}/u', $m[1]) ? 'yes' : 'no') . PHP_EOL;
    echo "HTML_HEX=" . bin2hex($m[1]) . PHP_EOL;
} else {
    echo "HTML_LINK=not found" . PHP_EOL;
}
