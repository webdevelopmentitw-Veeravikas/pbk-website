<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\ActivityLog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;

class SeoController extends BaseAdminController
{
    public function index(): void
    {
        $sitemapExists = is_file(PUBLIC_PATH . '/sitemap.xml');
        $robotsExists = is_file(PUBLIC_PATH . '/robots.txt');

        $this->view('admin.seo.index', [
            'sitemapExists' => $sitemapExists,
            'robotsExists'  => $robotsExists,
            'sitemapUrl'    => url('public/sitemap.xml'),
            'robotsUrl'     => url('public/robots.txt'),
        ], 'admin.layouts.app');
    }

    public function generateSitemap(): void
    {
        $baseUrl = rtrim((string) config('app.url', url('/')), '/');
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        $xml .= $this->urlEntry($baseUrl . '/', '1.0', 'daily');

        foreach ((new Page())->where('status = 1', [], 'sort_order ASC') as $page) {
            $xml .= $this->urlEntry($baseUrl . '/page/' . $page['slug'], '0.8', 'weekly', $page['updated_at'] ?? null);
        }

        foreach ((new Post())->where("status = 'published'", [], 'publish_date DESC') as $post) {
            $xml .= $this->urlEntry($baseUrl . '/post/' . $post['slug'], '0.9', 'weekly', $post['updated_at'] ?? null);
        }

        foreach ((new Category())->where('status = 1', [], 'sort_order ASC') as $category) {
            $xml .= $this->urlEntry($baseUrl . '/category/' . $category['slug'], '0.7', 'weekly', $category['updated_at'] ?? null);
        }

        $xml .= '</urlset>';

        file_put_contents(PUBLIC_PATH . '/sitemap.xml', $xml);

        ActivityLog::record(Auth::id(), 'seo_sitemap', 'Generated sitemap.xml');

        if ($this->request->isAjax()) {
            $this->json(['success' => true, 'message' => 'Sitemap generated.', 'url' => url('public/sitemap.xml')]);
        }

        $this->flash('success', 'Sitemap generated.');
        $this->redirect(url('/admin/seo'));
    }

    public function generateRobots(): void
    {
        $settingModel = new Setting();
        $custom = $settingModel->get('robots_txt');
        $sitemapUrl = rtrim((string) config('app.url', url('/')), '/') . '/public/sitemap.xml';

        if ($custom) {
            $content = (string) $custom;
        } else {
            $content = "User-agent: *\nAllow: /\nDisallow: /admin/\n\nSitemap: {$sitemapUrl}\n";
        }

        if (!str_contains($content, 'Sitemap:')) {
            $content .= "\nSitemap: {$sitemapUrl}\n";
        }

        file_put_contents(PUBLIC_PATH . '/robots.txt', $content);

        ActivityLog::record(Auth::id(), 'seo_robots', 'Generated robots.txt');

        if ($this->request->isAjax()) {
            $this->json(['success' => true, 'message' => 'robots.txt generated.']);
        }

        $this->flash('success', 'robots.txt generated.');
        $this->redirect(url('/admin/seo'));
    }

    private function urlEntry(string $loc, string $priority, string $changefreq, ?string $lastmod = null): string
    {
        $entry = "  <url>\n    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
        if ($lastmod) {
            $entry .= '    <lastmod>' . date('Y-m-d', strtotime($lastmod)) . "</lastmod>\n";
        }
        $entry .= "    <changefreq>{$changefreq}</changefreq>\n";
        $entry .= "    <priority>{$priority}</priority>\n";
        $entry .= "  </url>\n";
        return $entry;
    }
}
