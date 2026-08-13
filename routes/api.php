<?php

declare(strict_types=1);

/**
 * API routes (AJAX / JSON)
 */

use App\Controllers\Api\SearchController;
use App\Controllers\Api\OrganizationApiController;

/** @var \App\Core\App $app */
$router = $app->router();

$router->get('/api/search', [SearchController::class, 'search']);
$router->get('/api/slug', function () {
    $title = $_GET['title'] ?? '';
    header('Content-Type: application/json');
    echo json_encode(['slug' => slugify((string) $title)]);
    exit;
});

// Organization API — public reads
$router->get('/api/teams', [OrganizationApiController::class, 'teams']);
$router->get('/api/teams/{id}', [OrganizationApiController::class, 'team']);
$router->get('/api/members', [OrganizationApiController::class, 'members']);
$router->get('/api/members/{id}', [OrganizationApiController::class, 'member']);

// Organization API — admin writes
$router->group(['middleware' => ['admin']], function ($router) {
    $router->post('/api/teams', [OrganizationApiController::class, 'teams'], ['csrf']);
    $router->put('/api/teams/{id}', [OrganizationApiController::class, 'team'], ['csrf']);
    $router->delete('/api/teams/{id}', [OrganizationApiController::class, 'team'], ['csrf']);
    $router->post('/api/teams/{id}', [OrganizationApiController::class, 'team'], ['csrf']); // _method override

    $router->post('/api/members', [OrganizationApiController::class, 'members'], ['csrf']);
    $router->put('/api/members/{id}', [OrganizationApiController::class, 'member'], ['csrf']);
    $router->delete('/api/members/{id}', [OrganizationApiController::class, 'member'], ['csrf']);
    $router->post('/api/members/{id}', [OrganizationApiController::class, 'member'], ['csrf']);
});
