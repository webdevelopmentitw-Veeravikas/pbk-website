<?php

declare(strict_types=1);

/**
 * Seed data for CMS Portal
 * Run via: php database/seed.php
 * Or require from install.php (autoloader/constants already loaded).
 */

if (!defined('ROOT_PATH')) {
    require dirname(__DIR__) . '/vendor/autoload.php';
    require dirname(__DIR__) . '/config/constants.php';
}

use App\Core\Database;
use App\Core\Auth;

$db = Database::getInstance();

$seedCli = (PHP_SAPI === 'cli');
if ($seedCli) {
    echo "Seeding database...\n";
}
// Roles
$db->query("DELETE FROM role_permissions");
$db->query("DELETE FROM activity_logs");
$db->query("DELETE FROM users");
$db->query("DELETE FROM roles");
$db->query("DELETE FROM permissions");

$roles = [
    ['name' => 'Super Admin', 'slug' => 'super_admin', 'description' => 'Full system access'],
    ['name' => 'Admin', 'slug' => 'admin', 'description' => 'Administrative access'],
    ['name' => 'Editor', 'slug' => 'editor', 'description' => 'Content editing access'],
];
foreach ($roles as $r) {
    $db->insert('roles', array_merge($r, [
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ]));
}

$permissionDefs = [
    'dashboard.view',
    'posts.view', 'posts.create', 'posts.edit', 'posts.delete',
    'pages.view', 'pages.create', 'pages.edit', 'pages.delete',
    'categories.view', 'categories.create', 'categories.edit', 'categories.delete',
    'menus.view', 'menus.create', 'menus.edit', 'menus.delete',
    'banners.view', 'banners.create', 'banners.edit', 'banners.delete',
    'gallery.view', 'gallery.create', 'gallery.edit', 'gallery.delete',
    'videos.view', 'videos.create', 'videos.edit', 'videos.delete',
    'events.view', 'events.create', 'events.edit', 'events.delete',
    'announcements.view', 'announcements.create', 'announcements.edit', 'announcements.delete',
    'media.view', 'media.upload', 'media.delete',
    'users.view', 'users.create', 'users.edit', 'users.delete',
    'settings.view', 'settings.edit',
    'contact.view', 'contact.delete',
    'newsletter.view', 'newsletter.delete',
    'seo.view', 'seo.edit',
    'backup.view', 'backup.create', 'backup.restore',
    'activity.view',
];

foreach ($permissionDefs as $slug) {
    $db->insert('permissions', [
        'name' => ucwords(str_replace(['.', '_'], ' ', $slug)),
        'slug' => $slug,
        'group_name' => explode('.', $slug)[0],
        'created_at' => date('Y-m-d H:i:s'),
    ]);
}

// Super admin gets all; admin most; editor content only
$allPerms = $db->fetchAll('SELECT id, slug FROM permissions');
$superRole = $db->fetch("SELECT id FROM roles WHERE slug = 'super_admin'");
$adminRole = $db->fetch("SELECT id FROM roles WHERE slug = 'admin'");
$editorRole = $db->fetch("SELECT id FROM roles WHERE slug = 'editor'");

foreach ($allPerms as $p) {
    $db->insert('role_permissions', ['role_id' => $superRole['id'], 'permission_id' => $p['id']]);
    if (!str_starts_with($p['slug'], 'backup.') && $p['slug'] !== 'users.delete') {
        $db->insert('role_permissions', ['role_id' => $adminRole['id'], 'permission_id' => $p['id']]);
    }
    if (preg_match('/^(posts|pages|categories|gallery|videos|events|announcements|media|dashboard)\./', $p['slug'])) {
        $db->insert('role_permissions', ['role_id' => $editorRole['id'], 'permission_id' => $p['id']]);
    }
}

// Users
$now = date('Y-m-d H:i:s');
$db->insert('users', [
    'role_id' => $superRole['id'],
    'name' => 'Super Admin',
    'email' => 'admin@cms.local',
    'password' => Auth::hashPassword('Admin@123'),
    'status' => 1,
    'created_at' => $now,
    'updated_at' => $now,
]);
$db->insert('users', [
    'role_id' => $editorRole['id'],
    'name' => 'Content Editor',
    'email' => 'editor@cms.local',
    'password' => Auth::hashPassword('Editor@123'),
    'status' => 1,
    'created_at' => $now,
    'updated_at' => $now,
]);

$adminUser = $db->fetch("SELECT id FROM users WHERE email = 'admin@cms.local'");

// Settings
$settings = [
    ['general', 'site_name', 'தமிழக மக்கள் முன்னணி', 'text'],
    ['general', 'site_tagline', 'அதிகாரப்பூர்வ இணையதளம்', 'text'],
    ['general', 'site_email', 'info@example.com', 'text'],
    ['general', 'site_phone', '+91 9092529250', 'text'],
    ['general', 'site_address', 'Tamil Nadu, India', 'textarea'],
    ['general', 'logo', '', 'image'],
    ['general', 'favicon', '', 'image'],
    ['general', 'footer_text', '© ' . date('Y') . ' தமிழக மக்கள் முன்னணி. அனைத்து உரிமைகளும் பாதுகாக்கப்பட்டவை.', 'textarea'],
    ['general', 'google_analytics', '', 'textarea'],
    ['social', 'facebook_url', '#', 'text'],
    ['social', 'twitter_url', '#', 'text'],
    ['social', 'youtube_url', '#', 'text'],
    ['social', 'instagram_url', '#', 'text'],
    ['smtp', 'smtp_host', 'smtp.gmail.com', 'text'],
    ['smtp', 'smtp_port', '587', 'text'],
    ['smtp', 'smtp_username', '', 'text'],
    ['smtp', 'smtp_password', '', 'text'],
    ['smtp', 'smtp_encryption', 'tls', 'text'],
    ['seo', 'meta_title', 'தமிழக மக்கள் முன்னணி | அதிகாரப்பூர்வ இணையதளம்', 'text'],
    ['seo', 'meta_description', 'அதிகாரப்பூர்வ இணையதளம்', 'textarea'],
    ['seo', 'meta_keywords', 'tamil, politics, news', 'text'],
];

$db->query('DELETE FROM settings');
foreach ($settings as [$group, $key, $value, $type]) {
    $db->insert('settings', [
        'group' => $group,
        'key' => $key,
        'value' => $value,
        'type' => $type,
        'created_at' => $now,
        'updated_at' => $now,
    ]);
}

// Categories
$db->query('DELETE FROM categories');
$cats = [
    ['அறிக்கைகள்', 'arikkaihal', 'தலைமை ஒருங்கிணைப்பாளர் அறிக்கைகள்', null],
    ['அறிவிப்புகள்', 'arivippukal', 'அதிகாரப்பூர்வ அறிவிப்புகள்', null],
    ['நிகழ்வுகள்', 'nigalvugal', 'கட்சி நிகழ்வுகள்', null],
    ['செய்திகள்', 'seythigal', 'சமீபத்திய செய்திகள்', null],
];
$catIds = [];
foreach ($cats as $i => [$name, $slug, $desc, $parent]) {
    $catIds[$slug] = $db->insert('categories', [
        'parent_id' => $parent,
        'name' => $name,
        'slug' => $slug,
        'description' => $desc,
        'seo_title' => $name,
        'sort_order' => $i,
        'status' => 1,
        'created_at' => $now,
        'updated_at' => $now,
    ]);
}

// Menus
$db->query('DELETE FROM menus');
$headerMenus = [
    ['முகப்பு', '/', null, 0],
    ['எங்களைப் பற்றி', '/page/about', null, 1],
    ['செய்திகள்', '/news', null, 2],
    ['நிகழ்வுகள்', '/events', null, 3],
    ['தொகுப்பு', '/gallery', null, 4],
    ['காணொளிகள்', '/videos', null, 5],
    ['தொடர்பு', '/contact', null, 6],
];
foreach ($headerMenus as [$title, $url, $parent, $order]) {
    $db->insert('menus', [
        'parent_id' => $parent,
        'title' => $title,
        'url' => $url,
        'url_type' => 'internal',
        'target' => '_self',
        'location' => 'header',
        'sort_order' => $order,
        'status' => 1,
        'created_at' => $now,
        'updated_at' => $now,
    ]);
}
$footerLinks = [
    ['தனியுரிமைக் கொள்கை', '/page/privacy-policy', 0],
    ['விதிமுறைகள்', '/page/terms', 1],
    ['தொடர்பு', '/contact', 2],
];
foreach ($footerLinks as [$title, $url, $order]) {
    $db->insert('menus', [
        'title' => $title,
        'url' => $url,
        'url_type' => 'internal',
        'location' => 'footer',
        'sort_order' => $order,
        'status' => 1,
        'created_at' => $now,
        'updated_at' => $now,
    ]);
}

// Pages
$db->query('DELETE FROM pages');
$pages = [
    ['எங்களைப் பற்றி', 'about', '<p>நாம் மக்களின் அரசியல் இயக்கம். சமூக நீதி, மொழிப் பாதுகாப்பு மற்றும் மக்கள் நலன் ஆகியவற்றை முன்னிறுத்தி செயல்படுகிறோம்.</p>'],
    ['வரலாறு', 'history', '<p>எங்கள் இயக்கத்தின் வரலாறு மற்றும் போராட்டப் பாதை.</p>'],
    ['தொலைநோக்கு', 'vision', '<p>புதியதொரு தேசம் செய்வோம் என்ற இலக்குடன் செயல்படுகிறோம்.</p>'],
    ['நோக்கம்', 'mission', '<p>மக்கள் நலனுக்கான அரசியல் மாற்றத்தை உருவாக்குதல்.</p>'],
    ['தனியுரிமைக் கொள்கை', 'privacy-policy', '<p>உங்கள் தனிப்பட்ட தகவல்களை நாங்கள் பாதுகாக்கிறோம்.</p>'],
    ['விதிமுறைகள்', 'terms', '<p>இந்த வலைத்தளத்தைப் பயன்படுத்துவதற்கான விதிமுறைகள்.</p>'],
];
foreach ($pages as $i => [$title, $slug, $content]) {
    $db->insert('pages', [
        'title' => $title,
        'slug' => $slug,
        'content' => $content,
        'seo_title' => $title,
        'sort_order' => $i,
        'status' => 1,
        'created_at' => $now,
        'updated_at' => $now,
    ]);
}

// Sample posts
$db->query('DELETE FROM post_tags');
$db->query('DELETE FROM post_images');
$db->query('DELETE FROM posts');
$db->query('DELETE FROM tags');

$tagId = $db->insert('tags', ['name' => 'அரசியல்', 'slug' => 'arasial', 'created_at' => $now]);
$tagId2 = $db->insert('tags', ['name' => 'செய்தி', 'slug' => 'seythi', 'created_at' => $now]);

$posts = [
    ['மக்கள் நலனுக்கான புதிய அறிக்கை', 'makkal-nalan-arikkai', 'அறிக்கைகள் குறித்த சுருக்க விளக்கம்.', $catIds['arikkaihal'], 1, 1, 0],
    ['முக்கிய அறிவிப்பு - மாவட்டக் கூட்டம்', 'mukkiya-arivippu', 'மாவட்ட அளவிலான கூட்டம் குறித்த அறிவிப்பு.', $catIds['arivippukal'], 0, 1, 1],
    ['சமீபத்திய போராட்டச் செய்தி', 'porattam-seythi', 'மக்கள் போராட்டம் குறித்த விவரங்கள்.', $catIds['seythigal'], 1, 0, 1],
];

foreach ($posts as $i => [$title, $slug, $short, $cat, $featured, $breaking, $trending]) {
    $pid = $db->insert('posts', [
        'user_id' => $adminUser['id'],
        'category_id' => $cat,
        'title' => $title,
        'slug' => $slug,
        'short_description' => $short,
        'content' => '<p>' . $short . '</p><p>மேலும் விவரங்கள் விரைவில்.</p>',
        'is_featured' => $featured,
        'is_breaking' => $breaking,
        'is_trending' => $trending,
        'views' => rand(10, 200),
        'publish_date' => $now,
        'status' => 'published',
        'seo_title' => $title,
        'created_at' => $now,
        'updated_at' => $now,
    ]);
    $db->insert('post_tags', ['post_id' => $pid, 'tag_id' => $tagId]);
    $db->insert('post_tags', ['post_id' => $pid, 'tag_id' => $tagId2]);
}

// Banners
$db->query('DELETE FROM banners');
$db->insert('banners', [
    'title' => 'புதியதொரு தேசம் செய்வோம்!',
    'subtitle' => 'மக்கள் அரசியல் புரட்சி',
    'image' => 'assets/images/placeholder-banner.svg',
    'type' => 'slider',
    'link' => '/page/about',
    'sort_order' => 0,
    'status' => 1,
    'created_at' => $now,
    'updated_at' => $now,
]);

// Announcements
$db->query('DELETE FROM announcements');
$db->insert('announcements', [
    'title' => 'முக்கிய அறிவிப்பு',
    'content' => 'வரவிருக்கும் மாவட்டக் கூட்டங்களில் கலந்து கொள்ளுங்கள்.',
    'type' => 'scrolling',
    'status' => 1,
    'created_at' => $now,
    'updated_at' => $now,
]);
$db->insert('announcements', [
    'title' => 'பிரேக்கிங் நியூஸ்',
    'content' => 'புதிய அறிக்கை வெளியீடு',
    'type' => 'breaking',
    'link' => '/news',
    'status' => 1,
    'created_at' => $now,
    'updated_at' => $now,
]);

// Events
$db->query('DELETE FROM events');
$db->insert('events', [
    'title' => 'மாநில மாநாடு 2026',
    'slug' => 'manila-manadu-2026',
    'description' => '<p>மாநில அளவிலான மாநாடு.</p>',
    'location' => 'Chennai, Tamil Nadu',
    'event_date' => date('Y-m-d', strtotime('+30 days')),
    'event_time' => '10:00:00',
    'status' => 1,
    'created_at' => $now,
    'updated_at' => $now,
]);

// Gallery
$db->query('DELETE FROM gallery_images');
$db->query('DELETE FROM gallery');
$gid = $db->insert('gallery', [
    'title' => 'பொதுக்கூட்டங்கள்',
    'slug' => 'pothukkootangal',
    'description' => 'சமீபத்திய பொதுக்கூட்டப் படங்கள்',
    'status' => 1,
    'created_at' => $now,
    'updated_at' => $now,
]);

// Videos
$db->query('DELETE FROM videos');
$db->insert('videos', [
    'title' => 'அறிமுகக் காணொளி',
    'slug' => 'arimuga-kaanoli',
    'description' => 'இயக்க அறிமுகம்',
    'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
    'status' => 1,
    'created_at' => $now,
    'updated_at' => $now,
]);

if ($seedCli) {
    echo "Seed completed successfully.\n";
    echo "Login: admin@cms.local / Admin@123\n";
}