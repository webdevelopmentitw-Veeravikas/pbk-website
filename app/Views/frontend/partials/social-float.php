<?php
$socials = [
    [
        'key' => 'facebook',
        'label' => 'Facebook',
        'url' => $settings['facebook_url'] ?? '',
        'svg' => '<path fill="currentColor" d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14C17.07 2.09 15.74 2 14.64 2 11.6 2 9.5 3.9 9.5 7.02V9.5H7v4h2.5V22h4.5z"/>',
    ],
    [
        'key' => 'twitter',
        'label' => 'X',
        'url' => $settings['twitter_url'] ?? '',
        'svg' => '<path fill="currentColor" d="M18.244 2H21l-6.54 7.47L22 22h-6.79l-4.74-6.2L5.2 22H2.44l6.99-7.99L2 2h6.95l4.28 5.7L18.244 2zm-1.19 18h1.88L7.03 3.94H5.02L17.054 20z"/>',
    ],
    [
        'key' => 'instagram',
        'label' => 'Instagram',
        'url' => $settings['instagram_url'] ?? '',
        'svg' => '<path fill="currentColor" d="M7 3h10a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4zm10 2H7a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zm-5 3.2A3.8 3.8 0 1 1 8.2 12 3.8 3.8 0 0 1 12 8.2zm0 2A1.8 1.8 0 1 0 13.8 12 1.8 1.8 0 0 0 12 10.2zM17.4 6.3a1 1 0 1 1-1 1 1 1 0 0 1 1-1z"/>',
    ],
    [
        'key' => 'youtube',
        'label' => 'YouTube',
        'url' => $settings['youtube_url'] ?? '',
        'svg' => '<path fill="currentColor" d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2 31.5 31.5 0 0 0 0 12a31.5 31.5 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1A31.5 31.5 0 0 0 24 12a31.5 31.5 0 0 0-.5-5.8zM9.8 15.5V8.5L15.8 12z"/>',
    ],
];

$visible = [];
foreach ($socials as $item) {
    $href = trim((string) $item['url']);
    if ($href === '') {
        continue;
    }
    $item['url'] = $href;
    $visible[] = $item;
}

if ($visible === []) {
    return;
}
?>
<aside class="social-float" aria-label="Social media">
  <?php foreach ($visible as $item): ?>
  <a class="social-float-btn social-float-<?= e($item['key']) ?>"
     href="<?= e($item['url']) ?>"
     target="_blank"
     rel="noopener noreferrer"
     title="<?= e($item['label']) ?>"
     aria-label="<?= e($item['label']) ?>">
    <svg viewBox="0 0 24 24" aria-hidden="true"><?= $item['svg'] ?></svg>
    <span class="social-float-tip"><?= e($item['label']) ?></span>
  </a>
  <?php endforeach; ?>
</aside>
