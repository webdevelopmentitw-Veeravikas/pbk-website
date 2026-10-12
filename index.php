<?php

declare(strict_types=1);

/**
 * Front controller — all requests route through here.
 */

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/constants.php';

use App\Core\App;

$app = new App();

// Load route definitions
require __DIR__ . '/routes/web.php';
require __DIR__ . '/routes/admin.php';
require __DIR__ . '/routes/api.php';

// Last: allow /history as alias of /page/history (must be after /admin routes)
// Leading backslash required — `use App\Core\App` would otherwise resolve this wrong.
$app->router()->get('/{slug}', [\App\Controllers\Frontend\PageController::class, 'show']);

$app->run();
