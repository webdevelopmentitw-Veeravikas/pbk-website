<?php

declare(strict_types=1);

/**
 * Application configuration
 *
 * Live (pbkofficial.in): URL auto-detects from the request host.
 * Local XAMPP: falls back to http://localhost/p when host is empty (CLI).
 */
$https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || ((string) ($_SERVER['SERVER_PORT'] ?? '') === '443')
    || strtolower((string) ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '')) === 'https'
    || strtolower((string) ($_SERVER['REQUEST_SCHEME'] ?? '')) === 'https';

$host = (string) ($_SERVER['HTTP_HOST'] ?? '');
$base = defined('BASE_PATH') ? BASE_PATH : '';
$autoUrl = $host !== ''
    ? (($https ? 'https' : 'http') . '://' . $host . $base)
    : 'http://localhost/p';

$isLocal = $host === '' || str_contains($host, 'localhost') || str_starts_with($host, '127.0.0.1');

return [
    'name'            => 'CMS Portal',
    'env'             => $isLocal ? 'local' : 'production',
    'debug'           => $isLocal,
    'url'             => $autoUrl,
    'timezone'        => 'Asia/Kolkata',
    'locale'          => 'ta',
    'charset'         => 'UTF-8',
    'key'             => 'cms_change_this_secret_key_32chars!',
    'session_name'    => 'CMSSESSID',
    'session_lifetime'=> 7200,
    'csrf_token_name' => '_csrf_token',
    'upload_max_mb'   => 10,
    'allowed_images'  => ['jpg', 'jpeg', 'png', 'gif', 'webp'],
    'allowed_docs'    => ['pdf', 'doc', 'docx', 'xls', 'xlsx'],
    'thumbnail_width' => 400,
    'thumbnail_height'=> 300,
    'items_per_page'  => 15,
    'cache_enabled'   => false,
    'cache_ttl'       => 3600,
];
