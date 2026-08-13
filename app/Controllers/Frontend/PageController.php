<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Models\Page;

class PageController extends BaseFrontendController
{
    public function show(string $slug): void
    {
        $page = (new Page())->findBySlug($slug);
        if (!$page || (int) ($page['status'] ?? 0) !== 1) {
            $this->notFound('Page not found.');
        }

        $this->frontendView('frontend.pages.show', [
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
