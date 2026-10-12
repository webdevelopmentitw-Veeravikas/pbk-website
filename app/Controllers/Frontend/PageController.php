<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Models\Page;

class PageController extends BaseFrontendController
{
    public function show(string $slug): void
    {
        $slug = rawurldecode(trim($slug, '/'));
        $reserved = [
            'admin', 'api', 'public', 'assets', 'storage', 'vendor',
            'index.php', 'favicon.ico', 'robots.txt', 'sitemap.xml',
        ];
        if ($slug === '' || in_array(strtolower($slug), $reserved, true)) {
            $this->notFound('Page not found.');
        }

        $page = (new Page())->findBySlug($slug);
        if (!$page || (int) ($page['status'] ?? 0) !== 1) {
            $this->notFound('Page not found.');
        }

        $template = (string) ($page['template'] ?? 'default');
        $view = ($slug === 'about' || $template === 'about')
            ? 'frontend.pages.about'
            : 'frontend.pages.show';

        $this->frontendView($view, [
            'page' => $page,
        ]);
    }

    public function leader(): void
    {
        $page = (new Page())->findBySlug('leader');

        $this->frontendView('frontend.pages.leader', [
            'page' => $page,
        ]);
    }
}
