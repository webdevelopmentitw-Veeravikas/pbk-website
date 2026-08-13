<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Core\Controller;
use App\Models\Announcement;
use App\Models\Menu;
use App\Models\Setting;

abstract class BaseFrontendController extends Controller
{
    protected const LAYOUT = 'frontend.layouts.app';

    protected function shareLayoutData(): array
    {
        $setting = new Setting();
        $announcement = new Announcement();

        return [
            'headerMenus'   => (new Menu())->tree('header'),
            'footerMenus'   => (new Menu())->tree('footer'),
            'settings'      => [
                'site_name'     => $setting->get('site_name', config('app.name', 'CMS')),
                'site_tagline'  => $setting->get('site_tagline', ''),
                'site_email'    => $setting->get('site_email', ''),
                'site_phone'    => $setting->get('site_phone', ''),
                'site_address'  => $setting->get('site_address', ''),
                'logo'          => $setting->get('logo', ''),
                'logo_dark'     => $setting->get('logo_dark', ''),
                'favicon'       => $setting->get('favicon', ''),
                'facebook_url'  => $setting->get('facebook_url', $setting->get('facebook', '')),
                'twitter_url'   => $setting->get('twitter_url', $setting->get('twitter', '')),
                'instagram_url' => $setting->get('instagram_url', $setting->get('instagram', '')),
                'youtube_url'   => $setting->get('youtube_url', $setting->get('youtube', '')),
                'footer_text'   => $setting->get('footer_text', ''),
                'google_analytics' => $setting->get('google_analytics', ''),
            ],
            'announcements' => [
                'breaking'  => $announcement->activeByType('breaking'),
                'scrolling' => $announcement->activeByType('scrolling'),
                'popup'     => $announcement->activeByType('popup'),
                'alert'     => $announcement->activeByType('alert'),
            ],
        ];
    }

    protected function frontendView(string $path, array $data = []): void
    {
        $this->view($path, array_merge($this->shareLayoutData(), $data), self::LAYOUT);
    }

    protected function notFound(string $message = 'Page not found.'): void
    {
        if ($this->request->isAjax()) {
            $this->json(['success' => false, 'message' => $message], 404);
            return;
        }

        abort(404, $message);
    }

    protected function isPublishedPost(array $post): bool
    {
        if (($post['status'] ?? '') !== 'published') {
            return false;
        }

        if (!empty($post['publish_date']) && strtotime((string) $post['publish_date']) > time()) {
            return false;
        }

        return true;
    }
}
