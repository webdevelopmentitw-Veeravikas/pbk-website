<?php

declare(strict_types=1);

/**
 * Frontend & public routes
 */

use App\Controllers\Frontend\HomeController;
use App\Controllers\Frontend\PostController;
use App\Controllers\Frontend\PageController;
use App\Controllers\Frontend\GalleryController;
use App\Controllers\Frontend\VideoController;
use App\Controllers\Frontend\EventController;
use App\Controllers\Frontend\SearchController;
use App\Controllers\Frontend\ContactController;
use App\Controllers\Frontend\NewsletterController;
use App\Controllers\Frontend\MembershipController;
use App\Controllers\Frontend\OrganizationController;

/** @var \App\Core\App $app */
$router = $app->router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/news', [PostController::class, 'index']);
$router->get('/category/{slug}', [PostController::class, 'category']);
$router->get('/post/{slug}', [PostController::class, 'show']);
$router->get('/page/{slug}', [PageController::class, 'show']);
$router->get('/leader', [PageController::class, 'leader']);
$router->get('/gallery', [GalleryController::class, 'index']);
$router->get('/gallery/{slug}', [GalleryController::class, 'show']);
$router->get('/videos', [VideoController::class, 'index']);
$router->get('/videos/{slug}', [VideoController::class, 'show']);
$router->get('/events', [EventController::class, 'index']);
$router->get('/events/{slug}', [EventController::class, 'show']);
$router->get('/search', [SearchController::class, 'index']);
$router->get('/contact', [ContactController::class, 'index']);
$router->post('/contact', [ContactController::class, 'submit'], ['csrf']);
$router->post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'], ['csrf']);

// Membership registration
$router->get('/membership', [MembershipController::class, 'index']);
$router->post('/membership/register', [MembershipController::class, 'submit'], ['csrf']);
$router->get('/membership/success/{id}', [MembershipController::class, 'success']);
$router->get('/membership/card/{id}', [MembershipController::class, 'card']);

// Organization teams & members
$router->get('/organization', [OrganizationController::class, 'index']);
$router->get('/organization/search', [OrganizationController::class, 'search']);
$router->get('/organization/member/{id}', [OrganizationController::class, 'member']);
$router->get('/organization/{slug}', [OrganizationController::class, 'team']);

// SEO files
$router->get('/sitemap.xml', function () {
    $file = PUBLIC_PATH . '/sitemap.xml';
    if (is_file($file)) {
        header('Content-Type: application/xml; charset=UTF-8');
        readfile($file);
        exit;
    }
    http_response_code(404);
    echo 'Sitemap not generated yet';
});

$router->get('/robots.txt', function () {
    $file = PUBLIC_PATH . '/robots.txt';
    if (is_file($file)) {
        header('Content-Type: text/plain; charset=UTF-8');
        readfile($file);
        exit;
    }
    header('Content-Type: text/plain; charset=UTF-8');
    echo "User-agent: *\nAllow: /\nSitemap: " . url('/sitemap.xml') . "\n";
});

$router->get('/rss', function () {
    $posts = (new \App\Models\Post())->latest(20);
    header('Content-Type: application/rss+xml; charset=UTF-8');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<rss version="2.0"><channel>';
    echo '<title>' . e(setting('site_name', 'CMS')) . '</title>';
    echo '<link>' . e(url('/')) . '</link>';
    echo '<description>' . e(setting('meta_description', '')) . '</description>';
    foreach ($posts as $p) {
        echo '<item>';
        echo '<title>' . e($p['title']) . '</title>';
        echo '<link>' . e(url('/post/' . $p['slug'])) . '</link>';
        echo '<description>' . e($p['short_description'] ?? '') . '</description>';
        echo '<pubDate>' . date(DATE_RSS, strtotime($p['publish_date'] ?? $p['created_at'])) . '</pubDate>';
        echo '</item>';
    }
    echo '</channel></rss>';
    exit;
});
