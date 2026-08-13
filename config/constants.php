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
 * Subdirectory install path (local XAMPP: /p). Empty on live domain root.
 * Override with env CMS_BASE_PATH if auto-detect is wrong.
 */
$envBase = getenv('CMS_BASE_PATH');
if ($envBase !== false) {
    $basePath = rtrim(str_replace('\\', '/', (string) $envBase), '/');
    if ($basePath === '/') {
        $basePath = '';
    }
} else {
    $scriptName = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? '/index.php'));
    $basePath = str_replace('\\', '/', dirname($scriptName));
    if ($basePath === '/' || $basePath === '.' || $basePath === '') {
        $basePath = '';
    } else {
        $basePath = rtrim($basePath, '/');
    }
}
define('BASE_PATH', $basePath);
