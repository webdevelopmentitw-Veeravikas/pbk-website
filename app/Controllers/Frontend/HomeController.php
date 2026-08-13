<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Models\Announcement;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Video;

class HomeController extends BaseFrontendController
{
    public function index(): void
    {
        $postModel = new Post();
        $bannerModel = new Banner();
        $announcementModel = new Announcement();

        $this->frontendView('frontend.home.index', [
            'isHomePage'           => true,
            'sliders'              => $bannerModel->activeByType('slider'),
            'breakingAnnouncements' => $announcementModel->activeByType('breaking'),
            'scrollingAnnouncements' => $announcementModel->activeByType('scrolling'),
            'latestPosts'          => $postModel->latest(12),
            'featuredPosts'        => $postModel->featured(6),
            'categories'           => (new Category())->tree(),
            'upcomingEvents'       => (new Event())->upcoming(5),
            'videos'               => (new Video())->query(
                'SELECT * FROM `videos` WHERE status = 1 ORDER BY id DESC LIMIT 6'
            ),
            'galleries'            => (new Gallery())->query(
                'SELECT * FROM `gallery` WHERE status = 1 ORDER BY id DESC LIMIT 6'
            ),
        ]);
    }
}
