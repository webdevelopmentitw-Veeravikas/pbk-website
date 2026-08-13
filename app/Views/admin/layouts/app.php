<?php
use App\Core\Session;
use App\Core\View;

$alert = Session::flash('alert');
$currentUser = user();
$theme = $_COOKIE['cms_theme'] ?? 'light';
$siteName = setting('site_name', config('app.name', 'CMS Portal'));
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?= e($theme) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= e(csrf_token()) ?>">
    <meta name="app-url" content="<?= e(config('app.url', '')) ?>">
    <title><?= e($siteName) ?> — Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="<?= asset('assets/css/admin.css') ?>" rel="stylesheet">
    <?= View::yield('styles') ?>
</head>
<body class="admin-body">
    <div class="sidebar-overlay"></div>

    <aside class="admin-sidebar">
        <div class="admin-sidebar-brand">
            <i class="fa-solid fa-layer-group"></i>
            <span><?= e($siteName) ?></span>
        </div>
        <ul class="admin-nav">
            <?php
            $currentPath = rtrim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '', '/');
            $navItems = [
                ['url' => '/admin', 'icon' => 'fa-gauge-high', 'label' => 'Dashboard', 'exact' => true],
                ['url' => '/admin/posts', 'icon' => 'fa-newspaper', 'label' => 'Posts'],
                ['url' => '/admin/categories', 'icon' => 'fa-folder-tree', 'label' => 'Categories'],
                ['url' => '/admin/pages', 'icon' => 'fa-file-lines', 'label' => 'Pages'],
                ['url' => '/admin/menus', 'icon' => 'fa-bars', 'label' => 'Menus'],
                ['url' => '/admin/banners', 'icon' => 'fa-images', 'label' => 'Banners'],
                ['url' => '/admin/gallery', 'icon' => 'fa-photo-film', 'label' => 'Gallery'],
                ['url' => '/admin/videos', 'icon' => 'fa-video', 'label' => 'Videos'],
                ['url' => '/admin/events', 'icon' => 'fa-calendar-days', 'label' => 'Events'],
                ['url' => '/admin/announcements', 'icon' => 'fa-bullhorn', 'label' => 'Announcements'],
                ['url' => '/admin/media', 'icon' => 'fa-cloud-arrow-up', 'label' => 'Media'],
                ['url' => '/admin/users', 'icon' => 'fa-users', 'label' => 'Users'],
                ['url' => '/admin/contact', 'icon' => 'fa-envelope', 'label' => 'Contact'],
                ['url' => '/admin/newsletter', 'icon' => 'fa-paper-plane', 'label' => 'Newsletter'],
                ['url' => '/admin/members', 'icon' => 'fa-id-card', 'label' => 'Members'],
                ['url' => '/admin/seo', 'icon' => 'fa-magnifying-glass-chart', 'label' => 'SEO'],
                ['url' => '/admin/settings', 'icon' => 'fa-gear', 'label' => 'Settings'],
                ['url' => '/admin/activity', 'icon' => 'fa-clock-rotate-left', 'label' => 'Activity'],
                ['url' => '/admin/backup', 'icon' => 'fa-database', 'label' => 'Backup'],
            ];
            $orgOpen = str_contains($currentPath, '/admin/organization');
            foreach ($navItems as $item):
                if (!empty($item['exact'])) {
                    $active = in_array($currentPath, [rtrim(BASE_PATH . '/admin', '/'), rtrim(BASE_PATH . '/admin/dashboard', '/')], true) ? 'active' : '';
                } else {
                    $active = active_menu($item['url']);
                }
            ?>
            <li class="admin-nav-item">
                <a href="<?= url($item['url']) ?>" class="<?= e($active) ?>">
                    <i class="fa-solid <?= e($item['icon']) ?>"></i>
                    <span><?= e($item['label']) ?></span>
                </a>
            </li>
            <?php
                // Insert Organization group after Members
                if ($item['url'] === '/admin/members'):
            ?>
            <li class="admin-nav-item admin-nav-group <?= $orgOpen ? 'open' : '' ?>">
                <button type="button" class="admin-nav-group-toggle <?= $orgOpen ? 'active' : '' ?>" data-nav-group>
                    <i class="fa-solid fa-sitemap"></i>
                    <span>Organization</span>
                    <i class="fa-solid fa-chevron-down ms-auto nav-chevron"></i>
                </button>
                <ul class="admin-nav-sub">
                    <?php
                    $baseTeams = rtrim(BASE_PATH . '/admin/organization/teams', '/');
                    $baseMembers = rtrim(BASE_PATH . '/admin/organization/members', '/');
                    $teamsListActive = $currentPath === $baseTeams ? 'active' : '';
                    $teamsCreateActive = $currentPath === $baseTeams . '/create' ? 'active' : '';
                    $membersListActive = $currentPath === $baseMembers ? 'active' : '';
                    $membersCreateActive = $currentPath === $baseMembers . '/create' ? 'active' : '';
                    ?>
                    <li><a href="<?= url('/admin/organization/teams') ?>" class="<?= $teamsListActive ?>"><i class="fa-solid fa-list"></i><span>All Teams</span></a></li>
                    <li><a href="<?= url('/admin/organization/teams/create') ?>" class="<?= $teamsCreateActive ?>"><i class="fa-solid fa-plus"></i><span>Add Team</span></a></li>
                    <li><a href="<?= url('/admin/organization/members') ?>" class="<?= $membersListActive ?>"><i class="fa-solid fa-users"></i><span>All Members</span></a></li>
                    <li><a href="<?= url('/admin/organization/members/create') ?>" class="<?= $membersCreateActive ?>"><i class="fa-solid fa-user-plus"></i><span>Add Member</span></a></li>
                </ul>
            </li>
            <?php endif; endforeach; ?>
        </ul>
    </aside>

    <div class="admin-wrapper">
        <header class="admin-topbar">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <a href="<?= url('/') ?>" target="_blank" class="btn btn-sm btn-outline-secondary">
                    <i class="fa-solid fa-external-link-alt me-1"></i> View Site
                </a>
            </div>
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="btn btn-sm btn-outline-secondary" id="themeToggle" title="Toggle dark mode">
                    <i class="fa-solid fa-<?= $theme === 'dark' ? 'sun' : 'moon' ?>"></i>
                </button>
                <div class="dropdown">
                    <button class="btn btn-sm btn-light dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                        <?php if (!empty($currentUser['avatar'])): ?>
                            <img src="<?= upload_url($currentUser['avatar']) ?>" alt="" class="rounded-circle" width="28" height="28" style="object-fit:cover;">
                        <?php else: ?>
                            <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:12px;">
                                <?= e(strtoupper(substr($currentUser['name'] ?? 'A', 0, 1))) ?>
                            </span>
                        <?php endif; ?>
                        <span><?= e($currentUser['name'] ?? 'Admin') ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?= url('/admin/settings') ?>"><i class="fa-solid fa-gear me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="<?= url('/admin/logout') ?>" method="POST">
                                <?= csrf_field() ?>
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <main class="admin-content">
            <?php if ($alert): ?>
                <div class="alert alert-<?= e($alert['type'] ?? 'info') ?> alert-dismissible fade show" role="alert">
                    <?= e($alert['message'] ?? '') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?= $content ?>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script src="<?= asset('assets/js/admin.js') ?>"></script>
    <?= View::yield('scripts') ?>
</body>
</html>
