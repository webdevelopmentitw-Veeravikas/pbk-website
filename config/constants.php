<?php

declare(strict_types=1);

/**
 * Global path & URL constants
 */
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('CONFIG_PATH', ROOT_PATH . '/config');
define('PUBLIC_PATH', ROOT_PATH . '/public');
define('STORAGE_PATH', ROOT_PATH . '/storage');
define('UPLOAD_PATH', PUBLIC_PATH . '/uploads');
define('VIEW_PATH', APP_PATH . '/Views');

/**
 * Subdirectory install path.
 * - Local XAMPP (htdocs/p): "/p"
 * - Live domain root (pbkofficial.in): ""
 */
$host = strtolower((string) ($_SERVER['HTTP_HOST'] ?? ''));
$isLocalHost = $host === ''
    || str_contains($host, 'localhost')
    || str_starts_with($host, '127.0.0.1');

$basePath = null;

$localOverride = CONFIG_PATH . '/base_path.local.php';
if ($isLocalHost && is_file($localOverride)) {
    $basePath = require $localOverride;
}

if ($basePath === null) {
    $envBase = getenv('CMS_BASE_PATH');
    if ($envBase !== false) {
        $basePath = $envBase;
    }
}

if ($basePath === null) {
    $docRoot = str_replace('\\', '/', (string) ($_SERVER['DOCUMENT_ROOT'] ?? ''));
    $docRoot = rtrim($docRoot, '/');
    $project = str_replace('\\', '/', ROOT_PATH);
    if ($docRoot !== '' && str_starts_with($project, $docRoot)) {
        $basePath = substr($project, strlen($docRoot)) ?: '';
    }
}

if ($basePath === null) {
    $scriptName = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? '/index.php'));
    $basePath = str_replace('\\', '/', dirname($scriptName));
}

$basePath = str_replace('\\', '/', (string) $basePath);
$basePath = rtrim($basePath, '/');
if ($basePath === '/' || $basePath === '.' || $basePath === '') {
    $basePath = '';
}

// Live/production domains are served from web root — never keep "/p".
if (!$isLocalHost && ($basePath === '/p' || $basePath === 'p')) {
    $basePath = '';
}

define('BASE_PATH', $basePath);
