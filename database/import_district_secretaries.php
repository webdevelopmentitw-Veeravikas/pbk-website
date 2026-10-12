<?php

declare(strict_types=1);

/**
 * Import District_Secretaries_Clean.xlsx into organization members.
 * php database/import_district_secretaries.php [path-to.xlsx]
 */

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/config/constants.php';

use App\Core\Database;

$xlsx = $argv[1] ?? 'C:\\Users\\Admin\\Downloads\\District_Secretaries_Clean.xlsx';
if (!is_file($xlsx)) {
    fwrite(STDERR, "File not found: {$xlsx}\n");
    exit(1);
}

$rows = readSheet($xlsx);
if (count($rows) < 2) {
    fwrite(STDERR, "No data rows found.\n");
    exit(1);
}

$header = array_map(static fn($v) => strtolower(trim((string) $v)), $rows[0]);
$col = static function (array $header, string $name): int {
    $i = array_search($name, $header, true);
    if ($i === false) {
        fwrite(STDERR, "Missing column: {$name}\n");
        exit(1);
    }
    return (int) $i;
};

$iName = $col($header, 'name');
$iDistrict = $col($header, 'district');
$iLocation = $col($header, 'location');
$iAddress = $col($header, 'address');
$iPhone = $col($header, 'phone');
$iNo = $col($header, 's. no');

$db = Database::getInstance();

$hasAddress = (bool) $db->fetch(
    "SELECT 1 AS ok FROM information_schema.COLUMNS
     WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'organization_members' AND COLUMN_NAME = 'address'"
);
if (!$hasAddress) {
    $db->query('ALTER TABLE organization_members ADD COLUMN address TEXT NULL AFTER district');
    echo "Added address column.\n";
}

$team = $db->fetch("SELECT id, name FROM organization_teams WHERE slug = 'mavattam-nirvagigal' LIMIT 1");
if (!$team) {
    $now = date('Y-m-d H:i:s');
    $teamId = $db->insert('organization_teams', [
        'name' => 'மாவட்ட நிர்வாகிகள்',
        'slug' => 'mavattam-nirvagigal',
        'description' => '<p>மாவட்டச் செயலாளர்கள்</p>',
        'sort_order' => 1,
        'status' => 1,
        'seo_title' => 'மாவட்ட நிர்வாகிகள்',
        'seo_description' => 'மாவட்டச் செயலாளர்கள்',
        'created_at' => $now,
        'updated_at' => $now,
    ]);
    echo "Created team மாவட்ட நிர்வாகிகள் (#{$teamId})\n";
} else {
    $teamId = (int) $team['id'];
    echo "Using team {$team['name']} (#{$teamId})\n";
}

$inserted = 0;
$updated = 0;
$skipped = 0;

foreach (array_slice($rows, 1) as $row) {
    $name = trim((string) ($row[$iName] ?? ''));
    if ($name === '') {
        $skipped++;
        continue;
    }

    $phone = preg_replace('/\s+/', '', trim((string) ($row[$iPhone] ?? ''))) ?? '';
    $district = trim((string) ($row[$iDistrict] ?? ''));
    $location = trim((string) ($row[$iLocation] ?? ''));
    $address = trim((string) ($row[$iAddress] ?? ''));
    $sort = (int) ($row[$iNo] ?? 0);

    $existing = null;
    if ($phone !== '') {
        $existing = $db->fetch(
            'SELECT id FROM organization_members WHERE team_id = :tid AND phone = :phone LIMIT 1',
            ['tid' => $teamId, 'phone' => $phone]
        );
    }
    if (!$existing) {
        $existing = $db->fetch(
            'SELECT id FROM organization_members WHERE team_id = :tid AND name = :name AND district = :district LIMIT 1',
            ['tid' => $teamId, 'name' => $name, 'district' => $district]
        );
    }

    $data = [
        'team_id' => $teamId,
        'name' => $name,
        'tamil_name' => $name,
        'designation' => $location !== '' ? $location : 'மாவட்டச் செயலாளர்',
        'position' => 'மாவட்டச் செயலாளர்',
        'district' => $district !== '' ? $district : null,
        'address' => $address !== '' ? $address : null,
        'state' => 'தமிழ்நாடு',
        'phone' => $phone !== '' ? $phone : null,
        'sort_order' => $sort,
        'featured' => 0,
        'status' => 1,
        'updated_at' => date('Y-m-d H:i:s'),
    ];

    if ($existing) {
        $db->update('organization_members', $data, 'id = :id', ['id' => (int) $existing['id']]);
        $updated++;
        continue;
    }

    $data['created_at'] = date('Y-m-d H:i:s');
    $db->insert('organization_members', $data);
    $inserted++;
}

echo "Inserted {$inserted}, updated {$updated}, skipped {$skipped}.\n";

/**
 * @return list<list<string>>
 */
function readSheet(string $xlsx): array
{
    if (str_ends_with(strtolower($xlsx), '.xml')) {
        $xml = file_get_contents($xlsx);
    } elseif (class_exists(ZipArchive::class)) {
        $zip = new ZipArchive();
        if ($zip->open($xlsx) !== true) {
            fwrite(STDERR, "Unable to open workbook.\n");
            exit(1);
        }
        $xml = $zip->getFromName('xl/worksheets/sheet1.xml');
        $zip->close();
    } else {
        fwrite(STDERR, "ZipArchive is not enabled. Pass the extracted sheet1.xml path.\n");
        exit(1);
    }
    if ($xml === false || $xml === '') {
        fwrite(STDERR, "Worksheet missing.\n");
        exit(1);
    }

    $sx = simplexml_load_string($xml);
    if ($sx === false) {
        fwrite(STDERR, "Invalid worksheet XML.\n");
        exit(1);
    }

    $out = [];
    foreach ($sx->sheetData->row as $row) {
        $cells = [];
        foreach ($row->c as $c) {
            $ref = (string) $c['r'];
            $col = preg_replace('/\d+/', '', $ref) ?? 'A';
            $idx = 0;
            $len = strlen($col);
            for ($i = 0; $i < $len; $i++) {
                $idx = $idx * 26 + (ord($col[$i]) - 64);
            }
            $idx--;
            $type = (string) $c['t'];
            if ($type === 'inlineStr') {
                $text = '';
                $inline = $c->is ?? null;
                if ($inline !== null && isset($inline->t)) {
                    foreach ($inline->t as $t) {
                        $text .= (string) $t;
                    }
                }
                if ($text === '' && $inline !== null && isset($inline->r)) {
                    foreach ($inline->r as $r) {
                        $text .= (string) ($r->t ?? '');
                    }
                }
                $cells[$idx] = $text;
            } else {
                $cells[$idx] = (string) $c->v;
            }
        }
        if ($cells === []) {
            continue;
        }
        $max = max(array_keys($cells));
        $line = array_fill(0, $max + 1, '');
        foreach ($cells as $i => $v) {
            $line[$i] = $v;
        }
        $out[] = $line;
    }

    return $out;
}
