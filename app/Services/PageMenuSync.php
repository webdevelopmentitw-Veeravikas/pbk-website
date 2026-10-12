<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Menu;
use App\Models\Page;

/**
 * Sync only pages marked "Show in header menu" into the header menu.
 */
final class PageMenuSync
{
    private Menu $menus;

    public function __construct(?Menu $menus = null)
    {
        $this->menus = $menus ?? new Menu();
        $this->ensureColumn();
    }

    public function syncAll(): void
    {
        $pages = (new Page())->all('sort_order ASC, id ASC');
        $selectedUrls = [];

        foreach ($pages as $page) {
            $url = $this->pageUrl((string) ($page['slug'] ?? ''));
            if ($url === null) {
                continue;
            }
            $this->syncPage($page);
            if ($this->shouldShowInHeader($page)) {
                $selectedUrls[$url] = true;
            }
        }

        $headerPageLinks = $this->menus->where(
            "location = :location AND url LIKE :prefix",
            ['location' => 'header', 'prefix' => '/page/%'],
            'id ASC'
        );

        foreach ($headerPageLinks as $item) {
            $url = (string) ($item['url'] ?? '');
            if ($url !== '' && empty($selectedUrls[$url]) && (int) ($item['status'] ?? 0) === 1) {
                $this->menus->update((int) $item['id'], ['status' => 0]);
            }
        }
    }

    public function syncPage(array $page, ?string $previousSlug = null): void
    {
        $slug = (string) ($page['slug'] ?? '');
        $url = $this->pageUrl($slug);
        if ($url === null) {
            return;
        }

        if ($previousSlug !== null && $previousSlug !== '' && $previousSlug !== $slug) {
            $this->removeBySlug($previousSlug);
        }

        $existing = $this->findHeaderItem($url);
        $show = $this->shouldShowInHeader($page);

        if (!$show) {
            if ($existing) {
                $this->menus->update((int) $existing['id'], [
                    'title'  => (string) ($page['title'] ?? $existing['title']),
                    'status' => 0,
                ]);
            }
            return;
        }

        $payload = [
            'title'      => (string) ($page['title'] ?? 'Page'),
            'url'        => $url,
            'url_type'   => 'internal',
            'target'     => '_self',
            'location'   => 'header',
            'status'     => 1,
            'sort_order' => (int) ($page['sort_order'] ?? 0),
        ];

        if ($existing) {
            $changed = (string) ($existing['title'] ?? '') !== $payload['title']
                || (int) ($existing['status'] ?? 0) !== 1
                || (int) ($existing['sort_order'] ?? 0) !== $payload['sort_order']
                || (string) ($existing['url'] ?? '') !== $payload['url'];
            if ($changed) {
                $this->menus->update((int) $existing['id'], $payload);
            }
            return;
        }

        if ($payload['sort_order'] <= 0) {
            $payload['sort_order'] = $this->nextSortOrder();
        }

        $this->menus->create($payload);
    }

    public function removeBySlug(string $slug): void
    {
        $url = $this->pageUrl($slug);
        if ($url === null) {
            return;
        }

        $existing = $this->findHeaderItem($url);
        if ($existing) {
            $this->menus->delete((int) $existing['id']);
        }
    }

    public function shouldShowInHeader(array $page): bool
    {
        return (int) ($page['status'] ?? 0) === 1
            && (int) ($page['show_in_menu'] ?? 0) === 1;
    }

    private function ensureColumn(): void
    {
        static $checked = false;
        if ($checked) {
            return;
        }
        $checked = true;

        try {
            $row = $this->menus->queryOne("SHOW COLUMNS FROM `pages` LIKE 'show_in_menu'");
            if ($row) {
                return;
            }
            $this->menus->db()->query(
                "ALTER TABLE `pages` ADD COLUMN `show_in_menu` TINYINT(1) NOT NULL DEFAULT 0 AFTER `status`"
            );
            // Keep existing About link selected by default.
            $this->menus->db()->query(
                "UPDATE `pages` SET `show_in_menu` = 1 WHERE `slug` = 'about'"
            );
        } catch (\Throwable) {
            // Column may already exist or DB unavailable during install.
        }
    }

    private function findHeaderItem(string $url): ?array
    {
        return $this->menus->queryOne(
            "SELECT * FROM `menus` WHERE `location` = :location AND `url` = :url LIMIT 1",
            ['location' => 'header', 'url' => $url]
        );
    }

    private function nextSortOrder(): int
    {
        $row = $this->menus->queryOne(
            "SELECT MAX(`sort_order`) AS max_sort FROM `menus` WHERE `location` = :location",
            ['location' => 'header']
        );
        return ((int) ($row['max_sort'] ?? 0)) + 1;
    }

    private function pageUrl(string $slug): ?string
    {
        $slug = trim($slug, '/');
        if ($slug === '') {
            return null;
        }
        return '/page/' . $slug;
    }
}
