<?php
/**
 * Social share buttons — reuse on posts, pages, events, videos.
 *
 * @var string $url
 * @var string $title
 * @var string|null $image
 * @var string|null $description
 */
$url = $url ?? url('/');
$title = $title ?? ($settings['site_name'] ?? setting('site_name', 'CMS'));
$image = $image ?? '';
$description = $description ?? '';
$encodedUrl = rawurlencode($url);
$encodedTitle = rawurlencode($title);
$encodedText = rawurlencode(trim($title . ($description ? ' — ' . $description : '')));
$encodedImage = $image !== '' ? rawurlencode($image) : '';
$mailtoBody = rawurlencode($title . "\n\n" . $url);
?>
<div class="share-buttons" data-share-url="<?= e($url) ?>" data-share-title="<?= e($title) ?>">
  <span class="share-label">பகிர்:</span>
  <div class="share-list">
    <a class="share-btn share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?= $encodedUrl ?>" target="_blank" rel="noopener noreferrer" title="Facebook" aria-label="Facebook">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14C17.07 2.09 15.74 2 14.64 2 11.6 2 9.5 3.9 9.5 7.02V9.5H7v4h2.5V22h4.5z"/></svg>
      <span>Facebook</span>
    </a>

    <a class="share-btn share-x" href="https://twitter.com/intent/tweet?url=<?= $encodedUrl ?>&text=<?= $encodedTitle ?>" target="_blank" rel="noopener noreferrer" title="X (Twitter)" aria-label="X">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M18.244 2H21l-6.54 7.47L22 22h-6.79l-4.74-6.2L5.2 22H2.44l6.99-7.99L2 2h6.95l4.28 5.7L18.244 2zm-1.19 18h1.88L7.03 3.94H5.02L17.054 20z"/></svg>
      <span>X</span>
    </a>

    <a class="share-btn share-whatsapp" href="https://api.whatsapp.com/send?text=<?= $encodedTitle ?>%20<?= $encodedUrl ?>" target="_blank" rel="noopener noreferrer" title="WhatsApp" aria-label="WhatsApp">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12.04 2C6.58 2 2.15 6.4 2.15 11.84c0 1.99.59 3.85 1.61 5.43L2 22l4.91-1.69a9.86 9.86 0 0 0 5.13 1.4h.01c5.46 0 9.89-4.4 9.89-9.84C21.94 6.4 17.5 2 12.04 2zm5.78 13.99c-.24.68-1.4 1.24-1.94 1.32-.5.07-1.13.1-1.82-.11-.42-.13-.96-.31-1.65-.61-2.9-1.26-4.79-4.2-4.93-4.39-.14-.19-1.15-1.53-1.15-2.92 0-1.39.73-2.07.99-2.36.26-.29.57-.36.76-.36h.55c.17 0 .41-.07.64.49.24.58.81 2 .88 2.14.07.15.12.32.02.51-.1.2-.15.32-.29.49-.15.17-.31.38-.44.51-.15.15-.3.31-.13.61.17.29.76 1.25 1.63 2.03 1.12 1 2.07 1.31 2.36 1.46.29.15.46.12.63-.07.17-.2.74-.86.94-1.16.2-.29.39-.24.66-.15.26.1 1.68.79 1.97.94.29.14.48.22.55.34.07.12.07.7-.17 1.38z"/></svg>
      <span>WhatsApp</span>
    </a>

    <a class="share-btn share-telegram" href="https://t.me/share/url?url=<?= $encodedUrl ?>&text=<?= $encodedTitle ?>" target="_blank" rel="noopener noreferrer" title="Telegram" aria-label="Telegram">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M9.78 15.39 9.5 19.2c.4 0 .57-.17.78-.37l1.87-1.79 3.88 2.85c.71.39 1.22.19 1.41-.66l2.56-12.04h.01c.23-1.05-.38-1.46-1.07-1.2L3.66 10.2c-1.02.4-.98.95-.17 1.2l3.95 1.23 9.17-5.78c.43-.28.83-.13.5.16z"/></svg>
      <span>Telegram</span>
    </a>

    <a class="share-btn share-linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $encodedUrl ?>" target="_blank" rel="noopener noreferrer" title="LinkedIn" aria-label="LinkedIn">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M6.94 8.5H3.75V20h3.19V8.5zM5.34 3.5A1.85 1.85 0 1 0 5.35 7.2a1.85 1.85 0 0 0-.01-3.7zM20.25 20h-3.18v-5.6c0-1.34-.02-3.06-1.86-3.06-1.87 0-2.16 1.46-2.16 2.96V20H9.87V8.5h3.05v1.57h.04c.42-.8 1.46-1.65 3-1.65 3.21 0 3.8 2.11 3.8 4.86V20z"/></svg>
      <span>LinkedIn</span>
    </a>

    <?php if ($encodedImage !== ''): ?>
    <a class="share-btn share-pinterest" href="https://pinterest.com/pin/create/button/?url=<?= $encodedUrl ?>&media=<?= $encodedImage ?>&description=<?= $encodedTitle ?>" target="_blank" rel="noopener noreferrer" title="Pinterest" aria-label="Pinterest">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12 2C6.5 2 2 6.3 2 11.6c0 4.1 2.6 7.6 6.2 8.9-.1-.8-.2-2 0-2.9.2-.8 1.3-5.4 1.3-5.4s-.3-.7-.3-1.6c0-1.5.9-2.6 2-2.6.9 0 1.4.7 1.4 1.5 0 .9-.6 2.3-.9 3.5-.3 1.1.5 1.9 1.5 1.9 1.8 0 3.1-2.3 3.1-5.1 0-2.1-1.4-3.7-4-3.7-2.9 0-4.7 2.2-4.7 4.6 0 .8.3 1.4.7 1.9l.2.3c-.1.3-.2.8-.3 1.1-.1.3-.2.4-.5.3-1.3-.5-1.9-1.9-1.9-3.5 0-2.6 2.2-5.8 6.6-5.8 3.5 0 5.8 2.6 5.8 5.3 0 3.6-2 6.3-5 6.3-1 0-1.9-.5-2.3-1.2l-.6 2.4c-.2.8-.8 1.8-1.2 2.5 1.1.3 2.2.5 3.4.5 5.5 0 10-4.3 10-9.6C22 6.3 17.5 2 12 2z"/></svg>
      <span>Pinterest</span>
    </a>
    <?php endif; ?>

    <a class="share-btn share-reddit" href="https://www.reddit.com/submit?url=<?= $encodedUrl ?>&title=<?= $encodedTitle ?>" target="_blank" rel="noopener noreferrer" title="Reddit" aria-label="Reddit">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M14.1 2.6a1.1 1.1 0 0 0-1 .6l-1.5 3.5a7.7 7.7 0 0 0-4.1 1.4 2.3 2.3 0 1 0 1.3 2.1c.7-.4 1.5-.7 2.4-.8l1.3 3.1c-2.1.1-4 .8-5.4 1.9a2 2 0 0 0-.2-.1 1.7 1.7 0 1 0 1.1 1.6c.1 1.7 2.3 3.1 5.1 3.1s5-1.4 5.1-3.1a1.7 1.7 0 1 0 1.1-1.6 1.8 1.8 0 0 0-.3.1c-1.4-1.1-3.3-1.8-5.3-1.9l1.4-3.3.7.2a1.1 1.1 0 1 0 .5-2.1 1.1 1.1 0 0 0-.3 0zM9.9 14.4a1.1 1.1 0 1 1 0 2.2 1.1 1.1 0 0 1 0-2.2zm4.2 0a1.1 1.1 0 1 1 0 2.2 1.1 1.1 0 0 1 0-2.2zm-4.4 2.9c.4.5 1.4.9 2.4.9s2-.4 2.4-.9a.4.4 0 0 0-.6-.5c-.3.3-1 .6-1.8.6s-1.5-.3-1.8-.6a.4.4 0 1 0-.6.5z"/></svg>
      <span>Reddit</span>
    </a>

    <a class="share-btn share-threads" href="https://www.threads.net/intent/post?text=<?= $encodedText ?>%20<?= $encodedUrl ?>" target="_blank" rel="noopener noreferrer" title="Threads" aria-label="Threads">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M16.2 10.1c-.1-.1-.3-.1-.4 0-.1.8-.3 1.5-.7 2.1-.6 1-1.6 1.7-3 1.9l-.4.1c1.1.5 1.9 1.2 2.4 2.1.6 1.1.7 2.4.3 3.6-.5 1.4-1.5 2.4-2.9 2.9-.7.3-1.5.4-2.3.4-2.1 0-3.7-.8-4.8-2.3C3.1 19.1 2.7 17 2.9 14.4c.1-1.4.5-2.7 1.1-3.8.8-1.5 2-2.6 3.6-3.2.9-.4 1.9-.5 2.9-.5 1.5 0 2.8.4 3.8 1.1.5.4.9.8 1.2 1.3.2.3.5.4.8.3.4-.1.6-.5.5-.9-.2-.7-.7-1.4-1.3-2-1.3-1.1-3.1-1.7-5-1.7-1.3 0-2.5.2-3.6.7C4.7 7 3.2 8.5 2.2 10.5 1.4 12 1 13.7.9 15.5c-.2 3.1.3 5.6 1.6 7.3 1.4 1.9 3.6 2.9 6.3 2.9 1.1 0 2.1-.2 3-.5 1.9-.7 3.2-2 3.9-3.9.5-1.5.5-3.1-.2-4.5-.5-1-1.4-1.9-2.6-2.5 1-.4 1.8-1.1 2.3-2 .7-1.1 1-2.3 1.1-3.5.1-.5-.3-.9-.8-.9-.2 0-.4.1-.5.2zM9.7 9.6c-.9.1-1.7.5-2.3 1.2-.7.8-1.1 1.9-1.2 3.2 0 .2.1.4.3.5h.1c.2 0 .4-.1.4-.3.1-1 .4-1.8.9-2.4.4-.5 1-.8 1.7-.9.2 0 .3-.2.3-.4s-.1-.4-.2-.4v-.5z"/></svg>
      <span>Threads</span>
    </a>

    <a class="share-btn share-email" href="mailto:?subject=<?= $encodedTitle ?>&body=<?= $mailtoBody ?>" title="Email" aria-label="Email">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5L4 8V6l8 5 8-5v2z"/></svg>
      <span>Email</span>
    </a>

    <button type="button" class="share-btn share-native" data-native-share title="More apps" aria-label="Share via device">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M18 16.1a2.9 2.9 0 0 0-2.1.9l-7.1-4.1a3.2 3.2 0 0 0 0-1.8l7.1-4.1a3 3 0 1 0-.9-1.8l-7.1 4.1a3 3 0 1 0 0 5.4l7.1 4.1a3 3 0 1 0 3-3.7z"/></svg>
      <span>More</span>
    </button>

    <button type="button" class="share-btn share-copy" data-copy-url="<?= e($url) ?>" title="Copy link" aria-label="Copy link">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>
      <span class="share-copy-label">Copy</span>
    </button>

    <button type="button" class="share-btn share-print" onclick="window.print()" title="Print" aria-label="Print">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M19 8H5c-1.7 0-3 1.3-3 3v6h4v4h12v-4h4v-6c0-1.7-1.3-3-3-3zM16 19H8v-5h8v5zm3-7c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zM17 3H7v4h10V3z"/></svg>
      <span>Print</span>
    </button>
  </div>
</div>
