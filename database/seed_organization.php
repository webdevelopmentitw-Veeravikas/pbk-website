<?php

declare(strict_types=1);

/**
 * Seed organization teams + sample members
 * php database/seed_organization.php
 */

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/config/constants.php';

use App\Core\Database;

$db = Database::getInstance();
$now = date('Y-m-d H:i:s');

$teams = [
    ['மாநில நிர்வாகிகள்', 'manila-nirvagigal', 'மாநில அளவிலான நிர்வாகப் பொறுப்பாளர்கள்'],
    ['மாவட்ட நிர்வாகிகள்', 'mavattam-nirvagigal', 'மாவட்ட அளவிலான நிர்வாகப் பொறுப்பாளர்கள்'],
    ['மாநில இளைஞரணி', 'manila-ilaignarani', 'மாநில இளைஞரணி அமைப்பு'],
    ['மாநில மாணவரணி', 'manila-maanavarani', 'மாநில மாணவரணி அமைப்பு'],
    ['மாநில APLF நிர்வாகிகள்', 'manila-aplf', 'மாநில APLF நிர்வாகிகள்'],
    ['மாநில டாக்டர் மூர்த்தியார் பேரவை', 'dr-moorthiyar-peravai', 'டாக்டர் மூர்த்தியார் பேரவை'],
    ['மாநில மகளிரணி', 'manila-magalirani', 'மாநில மகளிரணி அமைப்பு'],
    ['மாநில வழக்கறிஞர் அணி', 'manila-vazhakkarignar', 'மாநில வழக்கறிஞர் அணி'],
    ['மாநில தொழிற்சங்க அணி', 'manila-thozhirsangam', 'மாநில தொழிற்சங்க அணி'],
    ['மாநில சிறுபான்மை அணி', 'manila-sirupanmai', 'மாநில சிறுபான்மை அணி'],
    ['மாநில தகவல் தொழில்நுட்ப அணி', 'manila-it-ani', 'மாநில தகவல் தொழில்நுட்ப அணி'],
    ['மாநில மருத்துவர் அணி', 'manila-maruthuvar', 'மாநில மருத்துவர் அணி'],
];

echo "Seeding organization teams...\n";

$db->query('SET FOREIGN_KEY_CHECKS=0');
$db->query('DELETE FROM organization_members');
$db->query('DELETE FROM organization_teams');
$db->query('SET FOREIGN_KEY_CHECKS=1');

$teamIds = [];
foreach ($teams as $i => [$name, $slug, $desc]) {
    $teamIds[$slug] = $db->insert('organization_teams', [
        'name' => $name,
        'slug' => $slug,
        'description' => '<p>' . $desc . '</p>',
        'sort_order' => $i,
        'status' => 1,
        'seo_title' => $name,
        'seo_description' => $desc,
        'seo_keywords' => $name,
        'created_at' => $now,
        'updated_at' => $now,
    ]);
    echo "  + {$name}\n";
}

// Sample members for first two teams
$samples = [
    [
        'team' => 'manila-nirvagigal',
        'name' => 'செந்தமிழன்',
        'tamil_name' => 'செந்தமிழன்',
        'english_name' => 'Senthamizhan',
        'designation' => 'தலைமை ஒருங்கிணைப்பாளர்',
        'position' => 'தலைவர்',
        'assembly' => 'சென்னை',
        'district' => 'சென்னை',
        'featured' => 1,
    ],
    [
        'team' => 'manila-nirvagigal',
        'name' => 'அருள்மொழி',
        'tamil_name' => 'அருள்மொழி',
        'english_name' => 'Arulmozhi',
        'designation' => 'பொதுச் செயலாளர்',
        'position' => 'பொதுச் செயலாளர்',
        'assembly' => 'மதுரை',
        'district' => 'மதுரை',
        'featured' => 1,
    ],
    [
        'team' => 'mavattam-nirvagigal',
        'name' => 'கண்ணன்',
        'tamil_name' => 'கண்ணன்',
        'english_name' => 'Kannan',
        'designation' => 'மாவட்டச் செயலாளர்',
        'position' => 'செயலாளர்',
        'assembly' => 'கோயம்புத்தூர் தெற்கு',
        'district' => 'கோயம்புத்தூர்',
        'featured' => 0,
    ],
];

foreach ($samples as $i => $s) {
    $db->insert('organization_members', [
        'team_id' => $teamIds[$s['team']],
        'name' => $s['name'],
        'tamil_name' => $s['tamil_name'],
        'english_name' => $s['english_name'],
        'designation' => $s['designation'],
        'position' => $s['position'],
        'assembly' => $s['assembly'],
        'district' => $s['district'],
        'state' => 'தமிழ்நாடு',
        'biography' => '<p>' . $s['designation'] . ' — ' . $s['name'] . '</p>',
        'sort_order' => $i,
        'featured' => $s['featured'],
        'status' => 1,
        'joining_date' => date('Y-m-d'),
        'created_at' => $now,
        'updated_at' => $now,
    ]);
}

// Header menu: Organization
$exists = $db->fetch("SELECT id FROM menus WHERE url = '/organization' AND location = 'header'");
if (!$exists) {
    $parentId = $db->insert('menus', [
        'parent_id' => null,
        'title' => 'அமைப்பு',
        'url' => '/organization',
        'url_type' => 'internal',
        'target' => '_self',
        'location' => 'header',
        'sort_order' => 3,
        'status' => 1,
        'created_at' => $now,
        'updated_at' => $now,
    ]);
    echo "Menu 'அமைப்பு' created (#{$parentId})\n";
}

echo "Organization seed complete.\n";
