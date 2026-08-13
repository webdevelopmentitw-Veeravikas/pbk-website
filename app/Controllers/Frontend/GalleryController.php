<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Models\Gallery;

class GalleryController extends BaseFrontendController
{
    public function index(): void
    {
        $this->frontendView('frontend.gallery.index', [
            'galleries' => (new Gallery())->where('status = 1', [], 'id DESC'),
        ]);
    }

    public function show(string $slug): void
    {
        $model = new Gallery();
        $gallery = $model->findBySlug($slug);

        if (!$gallery || (int) ($gallery['status'] ?? 0) !== 1) {
            $this->notFound('Gallery album not found.');
        }

        $gallery = $model->withImages((int) $gallery['id']);

        $this->frontendView('frontend.gallery.show', [
            'gallery' => $gallery,
        ]);
    }
}
