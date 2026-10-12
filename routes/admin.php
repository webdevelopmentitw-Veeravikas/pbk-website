<?php

declare(strict_types=1);

/**
 * Admin panel routes
 */

use App\Controllers\Admin\AuthController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\MenuController;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\PostController;
use App\Controllers\Admin\PageController;
use App\Controllers\Admin\BannerController;
use App\Controllers\Admin\GalleryController;
use App\Controllers\Admin\VideoController;
use App\Controllers\Admin\EventController;
use App\Controllers\Admin\AnnouncementController;
use App\Controllers\Admin\MediaController;
use App\Controllers\Admin\UserController;
use App\Controllers\Admin\SettingController;
use App\Controllers\Admin\ContactController;
use App\Controllers\Admin\NewsletterController;
use App\Controllers\Admin\MemberController;
use App\Controllers\Admin\ActivityController;
use App\Controllers\Admin\BackupController;
use App\Controllers\Admin\SeoController;
use App\Controllers\Admin\OrganizationTeamController;
use App\Controllers\Admin\OrganizationMemberController;

/** @var \App\Core\App $app */
$router = $app->router();

// Guest auth
$router->group(['prefix' => '/admin', 'middleware' => ['guest']], function ($router) {
    $router->get('/login', [AuthController::class, 'loginForm']);
    $router->post('/login', [AuthController::class, 'login'], ['csrf']);
    $router->get('/forgot-password', [AuthController::class, 'forgotForm']);
    $router->post('/forgot-password', [AuthController::class, 'forgot'], ['csrf']);
    $router->get('/reset-password/{token}', [AuthController::class, 'resetForm']);
    $router->post('/reset-password', [AuthController::class, 'reset'], ['csrf']);
});

$router->post('/admin/logout', [AuthController::class, 'logout'], ['auth', 'csrf']);
$router->get('/admin/logout', [AuthController::class, 'logout'], ['auth']);

// Authenticated admin
$router->group(['prefix' => '/admin', 'middleware' => ['admin']], function ($router) {
    $router->get('/', [DashboardController::class, 'index']);
    $router->get('/dashboard', [DashboardController::class, 'index']);

    // Menus
    $router->get('/menus', [MenuController::class, 'index']);
    $router->get('/menus/create', [MenuController::class, 'create']);
    $router->post('/menus', [MenuController::class, 'store'], ['csrf']);
    $router->get('/menus/{id}/edit', [MenuController::class, 'edit']);
    $router->post('/menus/{id}', [MenuController::class, 'update'], ['csrf']);
    $router->post('/menus/{id}/delete', [MenuController::class, 'destroy'], ['csrf']);
    $router->post('/menus/reorder', [MenuController::class, 'reorder'], ['csrf']);
    $router->post('/menus/toggle-page/{id}', [MenuController::class, 'togglePage'], ['csrf']);

    // Categories
    $router->get('/categories', [CategoryController::class, 'index']);
    $router->get('/categories/create', [CategoryController::class, 'create']);
    $router->post('/categories', [CategoryController::class, 'store'], ['csrf']);
    $router->get('/categories/{id}/edit', [CategoryController::class, 'edit']);
    $router->post('/categories/{id}', [CategoryController::class, 'update'], ['csrf']);
    $router->post('/categories/{id}/delete', [CategoryController::class, 'destroy'], ['csrf']);

    // Posts
    $router->get('/posts', [PostController::class, 'index']);
    $router->get('/posts/create', [PostController::class, 'create']);
    $router->post('/posts', [PostController::class, 'store'], ['csrf']);
    $router->get('/posts/{id}/edit', [PostController::class, 'edit']);
    $router->post('/posts/{id}', [PostController::class, 'update'], ['csrf']);
    $router->post('/posts/{id}/delete', [PostController::class, 'destroy'], ['csrf']);

    // Pages
    $router->get('/pages', [PageController::class, 'index']);
    $router->get('/pages/create', [PageController::class, 'create']);
    $router->post('/pages', [PageController::class, 'store'], ['csrf']);
    $router->get('/pages/{id}/edit', [PageController::class, 'edit']);
    $router->post('/pages/{id}', [PageController::class, 'update'], ['csrf']);
    $router->post('/pages/{id}/delete', [PageController::class, 'destroy'], ['csrf']);

    // Banners
    $router->get('/banners', [BannerController::class, 'index']);
    $router->get('/banners/create', [BannerController::class, 'create']);
    $router->post('/banners', [BannerController::class, 'store'], ['csrf']);
    $router->get('/banners/{id}/edit', [BannerController::class, 'edit']);
    $router->post('/banners/{id}', [BannerController::class, 'update'], ['csrf']);
    $router->post('/banners/{id}/delete', [BannerController::class, 'destroy'], ['csrf']);

    // Gallery
    $router->get('/gallery', [GalleryController::class, 'index']);
    $router->get('/gallery/create', [GalleryController::class, 'create']);
    $router->post('/gallery', [GalleryController::class, 'store'], ['csrf']);
    $router->get('/gallery/{id}/edit', [GalleryController::class, 'edit']);
    $router->post('/gallery/{id}', [GalleryController::class, 'update'], ['csrf']);
    $router->post('/gallery/{id}/delete', [GalleryController::class, 'destroy'], ['csrf']);
    $router->post('/gallery/{id}/images', [GalleryController::class, 'uploadImages'], ['csrf']);
    $router->post('/gallery/images/{id}/delete', [GalleryController::class, 'deleteImage'], ['csrf']);

    // Videos
    $router->get('/videos', [VideoController::class, 'index']);
    $router->get('/videos/create', [VideoController::class, 'create']);
    $router->post('/videos', [VideoController::class, 'store'], ['csrf']);
    $router->get('/videos/{id}/edit', [VideoController::class, 'edit']);
    $router->post('/videos/{id}', [VideoController::class, 'update'], ['csrf']);
    $router->post('/videos/{id}/delete', [VideoController::class, 'destroy'], ['csrf']);

    // Events
    $router->get('/events', [EventController::class, 'index']);
    $router->get('/events/create', [EventController::class, 'create']);
    $router->post('/events', [EventController::class, 'store'], ['csrf']);
    $router->get('/events/{id}/edit', [EventController::class, 'edit']);
    $router->post('/events/{id}', [EventController::class, 'update'], ['csrf']);
    $router->post('/events/{id}/delete', [EventController::class, 'destroy'], ['csrf']);

    // Announcements
    $router->get('/announcements', [AnnouncementController::class, 'index']);
    $router->get('/announcements/create', [AnnouncementController::class, 'create']);
    $router->post('/announcements', [AnnouncementController::class, 'store'], ['csrf']);
    $router->get('/announcements/{id}/edit', [AnnouncementController::class, 'edit']);
    $router->post('/announcements/{id}', [AnnouncementController::class, 'update'], ['csrf']);
    $router->post('/announcements/{id}/delete', [AnnouncementController::class, 'destroy'], ['csrf']);

    // Media
    $router->get('/media', [MediaController::class, 'index']);
    $router->post('/media/upload', [MediaController::class, 'upload'], ['csrf']);
    $router->post('/media/editor-upload', [MediaController::class, 'editorUpload'], ['csrf']);
    $router->post('/media/{id}/rename', [MediaController::class, 'rename'], ['csrf']);
    $router->post('/media/{id}/delete', [MediaController::class, 'destroy'], ['csrf']);
    $router->get('/media/folders', [MediaController::class, 'folders']);

    // Users
    $router->get('/users', [UserController::class, 'index']);
    $router->get('/users/create', [UserController::class, 'create']);
    $router->post('/users', [UserController::class, 'store'], ['csrf']);
    $router->get('/users/{id}/edit', [UserController::class, 'edit']);
    $router->post('/users/{id}', [UserController::class, 'update'], ['csrf']);
    $router->post('/users/{id}/delete', [UserController::class, 'destroy'], ['csrf']);

    // Settings
    $router->get('/settings', [SettingController::class, 'index']);
    $router->post('/settings', [SettingController::class, 'update'], ['csrf']);

    // Contact
    $router->get('/contact', [ContactController::class, 'index']);
    $router->get('/contact/{id}', [ContactController::class, 'show']);
    $router->post('/contact/{id}/read', [ContactController::class, 'markRead'], ['csrf']);
    $router->post('/contact/{id}/delete', [ContactController::class, 'destroy'], ['csrf']);
    $router->get('/contact-export', [ContactController::class, 'exportCsv']);

    // Newsletter
    $router->get('/newsletter', [NewsletterController::class, 'index']);
    $router->post('/newsletter/{id}/delete', [NewsletterController::class, 'destroy'], ['csrf']);
    $router->get('/newsletter-export', [NewsletterController::class, 'exportCsv']);

    // Members
    $router->get('/members', [MemberController::class, 'index']);
    $router->get('/members/{id}', [MemberController::class, 'show']);
    $router->post('/members/{id}/delete', [MemberController::class, 'destroy'], ['csrf']);

    // Activity
    $router->get('/activity', [ActivityController::class, 'index']);

    // Backup
    $router->get('/backup', [BackupController::class, 'index']);
    $router->post('/backup/create', [BackupController::class, 'create'], ['csrf']);
    $router->post('/backup/restore', [BackupController::class, 'restore'], ['csrf']);
    $router->get('/backup/download/{file}', [BackupController::class, 'download']);

    // SEO
    $router->get('/seo', [SeoController::class, 'index']);
    $router->post('/seo/sitemap', [SeoController::class, 'generateSitemap'], ['csrf']);
    $router->post('/seo/robots', [SeoController::class, 'generateRobots'], ['csrf']);

    // Organization — Teams
    $router->get('/organization/teams', [OrganizationTeamController::class, 'index']);
    $router->get('/organization/teams/create', [OrganizationTeamController::class, 'create']);
    $router->post('/organization/teams', [OrganizationTeamController::class, 'store'], ['csrf']);
    $router->get('/organization/teams/{id}/edit', [OrganizationTeamController::class, 'edit']);
    $router->post('/organization/teams/{id}', [OrganizationTeamController::class, 'update'], ['csrf']);
    $router->post('/organization/teams/{id}/delete', [OrganizationTeamController::class, 'destroy'], ['csrf']);
    $router->post('/organization/teams/{id}/toggle', [OrganizationTeamController::class, 'toggle'], ['csrf']);
    $router->post('/organization/teams/reorder', [OrganizationTeamController::class, 'reorder'], ['csrf']);

    // Organization — Members
    $router->get('/organization/members', [OrganizationMemberController::class, 'index']);
    $router->get('/organization/members/create', [OrganizationMemberController::class, 'create']);
    $router->post('/organization/members', [OrganizationMemberController::class, 'store'], ['csrf']);
    $router->get('/organization/members/export', [OrganizationMemberController::class, 'export']);
    $router->post('/organization/members/import', [OrganizationMemberController::class, 'import'], ['csrf']);
    $router->post('/organization/members/bulk', [OrganizationMemberController::class, 'bulk'], ['csrf']);
    $router->post('/organization/members/reorder', [OrganizationMemberController::class, 'reorder'], ['csrf']);
    $router->post('/organization/members/{id}/photo', [OrganizationMemberController::class, 'photo'], ['csrf']);
    $router->get('/organization/members/{id}/edit', [OrganizationMemberController::class, 'edit']);
    $router->post('/organization/members/{id}', [OrganizationMemberController::class, 'update'], ['csrf']);
    $router->post('/organization/members/{id}/delete', [OrganizationMemberController::class, 'destroy'], ['csrf']);
    $router->post('/organization/members/{id}/toggle', [OrganizationMemberController::class, 'toggle'], ['csrf']);
});
