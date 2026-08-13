<?php
use App\Core\Session;
use App\Core\View;

$siteName = $settings['site_name'] ?? setting('site_name', config('app.name', 'CMS'));
$siteTagline = $settings['site_tagline'] ?? '';
$logo = upload_url($settings['logo'] ?? '');
$logoDark = !empty($settings['logo_dark']) ? upload_url($settings['logo_dark']) : $logo;
$theme = is_dark_mode() ? 'dark' : 'light';
$alert = Session::flash('alert');
$errors = Session::flash('errors') ?? [];
$popups = $announcements['popup'] ?? [];

if (!function_exists('menu_href')) {
    function menu_href(array $item): string
    {
        if (($item['url_type'] ?? 'internal') === 'external') {
            return (string) ($item['url'] ?? '#');
        }
        $path = $item['url'] ?? '/';
        return url($path);
    }
}

if (!function_exists('render_nav_items')) {
    function render_nav_items(array $items, int $depth = 0): void
    {
        foreach ($items as $item) {
            $children = $item['children'] ?? [];
            $href = menu_href($item);
            $target = !empty($item['target']) ? $item['target'] : '_self';
            $active = active_menu(parse_url($href, PHP_URL_PATH) ?: '/');
            $isCta = str_contains(strtolower($item['title'] ?? ''), 'சேர')
                || str_contains(strtolower($item['title'] ?? ''), 'join')
                || str_contains($item['title'] ?? '', 'உறுப்பினர்')
                || str_contains((string) ($item['url'] ?? ''), 'membership');

            if (!empty($children)) {
                $panelClass = count($children) > 4 ? '' : ' single-col';
                echo '<div class="drop" data-dropdown>';
                echo '<button type="button" class="dropbtn" aria-expanded="false">' . e($item['title']) . ' ▾</button>';
                echo '<div class="drop-panel' . $panelClass . '">';
                foreach ($children as $child) {
                    $childHref = menu_href($child);
                    $childTarget = !empty($child['target']) ? $child['target'] : '_self';
                    echo '<a href="' . e($childHref) . '" target="' . e($childTarget) . '">' . e($child['title']) . '</a>';
                }
                echo '</div></div>';
            } else {
                $class = trim(($isCta ? 'cta-join ' : '') . $active);
                echo '<a href="' . e($href) . '" class="' . e($class) . '" target="' . e($target) . '">' . e($item['title']) . '</a>';
            }
        }
    }
}

if (!function_exists('render_footer_menus')) {
    function render_footer_menus(array $items): void
    {
        if (empty($items)) {
            return;
        }
        echo '<ul>';
        foreach ($items as $item) {
            $href = menu_href($item);
            $target = !empty($item['target']) ? $item['target'] : '_self';
            echo '<li><a href="' . e($href) . '" target="' . e($target) . '">' . e($item['title']) . '</a></li>';
            foreach ($item['children'] ?? [] as $child) {
                $childHref = menu_href($child);
                $childTarget = !empty($child['target']) ? $child['target'] : '_self';
                echo '<li><a href="' . e($childHref) . '" target="' . e($childTarget) . '">' . e($child['title']) . '</a></li>';
            }
        }
        echo '</ul>';
    }
}
?>
<!DOCTYPE html>
<html lang="<?= e(config('app.locale', 'ta')) ?>" data-theme="<?= e($theme) ?>">
<head>
<?php View::partial('frontend.partials.seo', [
    'seo' => $seo ?? [],
    'settings' => $settings ?? [],
]); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mukta+Malar:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= e(asset('assets/css/common.css')) ?>">
<link rel="stylesheet" href="<?= e(asset('assets/css/pages.css')) ?>">
<?php if (!empty($isHomePage)): ?>
<link rel="stylesheet" href="<?= e(asset('assets/css/home.css')) ?>">
<?php endif; ?>
</head>
<body class="<?= !empty($isHomePage) ? 'page-home' : 'page-inner' ?>">
<div class="site">

<header class="nav">
<div class="wrap">
<div class="nav-shell">
<a href="<?= e(url('/')) ?>" class="brand" aria-label="<?= e($siteName) ?>">
<div class="brand-mark">
<img src="<?= e($logo) ?>" alt="<?= e($siteName) ?>" class="logo logo-light" loading="lazy" width="120" >
<?php if ($logoDark !== $logo): ?>
<img src="<?= e($logoDark) ?>" alt="<?= e($siteName) ?>" class="logo logo-dark" loading="lazy" width="120" >
<?php endif; ?>
</div>
</a>

<div class="nav-right">
<nav class="links" id="navLinks" aria-label="Main navigation">
<?php render_nav_items($headerMenus ?? []); ?>
<?php if (empty($headerMenus)): ?>
<a href="<?= e(url('/')) ?>" class="<?= active_menu('/') ?>">முகப்பு</a>
<?php endif; ?>
</nav>
<button type="button" class="theme-toggle" id="themeToggle" aria-label="Toggle dark mode">🌙</button>
<button class="navburger" id="burgerBtn" type="button" aria-expanded="false" aria-label="Menu">☰</button>
</div>
</div>
</div>
</header>

<?php if ($alert): ?>
<div class="flash flash-<?= e($alert['type'] ?? 'info') ?>">
<div class="wrap"><?= e($alert['message'] ?? '') ?></div>
</div>
<?php endif; ?>

<main id="main-content">
<?= $content ?>
</main>

<footer>
<div class="wrap">
<div class="fgrid">
<div class="footer-about">
<?php if (!empty($settings['logo'])): ?>
<div class="footer-logo"><img src="<?= e($logo) ?>" alt="<?= e($siteName) ?>" loading="lazy"></div>
<?php endif; ?>
<h4><?= e($siteName) ?></h4>
<p><?= e($siteTagline ?: setting('footer_text', '')) ?></p>
<div class="social-links">
<?php if (!empty($settings['facebook_url'])): ?><a href="<?= e($settings['facebook_url']) ?>" target="_blank" rel="noopener noreferrer">Facebook</a><?php endif; ?>
<?php if (!empty($settings['twitter_url'])): ?><a href="<?= e($settings['twitter_url']) ?>" target="_blank" rel="noopener noreferrer">Twitter</a><?php endif; ?>
<?php if (!empty($settings['instagram_url'])): ?><a href="<?= e($settings['instagram_url']) ?>" target="_blank" rel="noopener noreferrer">Instagram</a><?php endif; ?>
<?php if (!empty($settings['youtube_url'])): ?><a href="<?= e($settings['youtube_url']) ?>" target="_blank" rel="noopener noreferrer">YouTube</a><?php endif; ?>
</div>
</div>
<?php
$footerMenusList = $footerMenus ?? [];
$half = (int) ceil(count($footerMenusList) / 2);
$footerA = array_slice($footerMenusList, 0, max(1, $half));
$footerB = array_slice($footerMenusList, max(1, $half));
?>
<div>
<h4>இணைப்புகள்</h4>
<?php render_footer_menus($footerA); ?>
</div>
<div>
<h4>மேலும்</h4>
<?php render_footer_menus($footerB ?: $footerA); ?>
</div>
<div class="footer-newsletter">
<h4>செய்திமடல்</h4>
<p>புதிய செய்திகளை உடனுக்குடன் பெறுங்கள்.</p>
<form class="newsletter-form" id="newsletterForm" action="<?= e(url('/newsletter/subscribe')) ?>" method="post">
<?= csrf_field() ?>
<input type="email" name="email" placeholder="மின்னஞ்சல் / Email" required>
<button type="submit" class="btn btn-primary btn-sm">சந்தா</button>
<div class="form-msg" id="newsletterMsg" hidden></div>
</form>
</div>
</div>
<div class="fbottom">
<div>© <?= date('Y') ?> <?= e($siteName) ?>. அனைத்து உரிமைகளும் பாதுகாக்கப்பட்டவை.</div>
<div><a href="<?= e(url('/page/privacy-policy')) ?>">தனியுரிமை</a> · <a href="<?= e(url('/contact')) ?>">தொடர்பு</a></div>
</div>
</div>
</footer>
</div>

<?php if (!empty($popups)): ?>
<?php $popup = $popups[0]; ?>
<div class="popup-overlay" id="popupOverlay" hidden data-popup-id="<?= (int) ($popup['id'] ?? 0) ?>">
<div class="popup-modal" role="dialog" aria-modal="true" aria-labelledby="popupTitle">
<button type="button" class="popup-close" id="popupClose" aria-label="Close">×</button>
<h3 id="popupTitle"><?= e($popup['title'] ?? '') ?></h3>
<?php if (!empty($popup['content'])): ?>
<div class="popup-body"><?= nl2br(e($popup['content'])) ?></div>
<?php endif; ?>
<?php if (!empty($popup['link'])): ?>
<a href="<?= e($popup['link']) ?>" class="btn btn-primary btn-sm">மேலும் அறிய</a>
<?php endif; ?>
</div>
</div>
<?php endif; ?>

<script>
window.CMS = {
    baseUrl: <?= json_encode(rtrim(url('/'), '/')) ?>,
    csrfToken: <?= json_encode(csrf_token()) ?>,
    csrfName: <?= json_encode(config('app.csrf_token_name', '_csrf_token')) ?>
};
</script>
<script src="<?= e(asset('assets/js/common.js')) ?>" defer></script>
<?php if (!empty($isHomePage)): ?>
<script src="<?= e(asset('assets/js/home.js')) ?>" defer></script>
<?php endif; ?>
</body>
</html>
