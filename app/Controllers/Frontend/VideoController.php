<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Models\Video;

class VideoController extends BaseFrontendController
{
    public function index(): void
    {
        $page = max(1, (int) $this->request->get('page', 1));
        $videos = (new Video())->paginate(
            $page,
            12,
            'status = 1',
            [],
            'id DESC'
        );

        $this->frontendView('frontend.videos.index', [
            'videos'  => $videos,
            'baseUrl' => url('/videos'),
        ]);
    }

    public function show(string $slug): void
    {
        $video = (new Video())->findBySlug($slug);
        if (!$video || (int) ($video['status'] ?? 0) !== 1) {
            $this->notFound('Video not found.');
        }

        $this->frontendView('frontend.videos.show', [
            'video' => $video,
        ]);
    }
}
