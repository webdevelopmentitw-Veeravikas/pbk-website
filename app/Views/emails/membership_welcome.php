<?php
$member = $member ?? [];
$cardUrl = $cardUrl ?? '#';
$siteName = $siteName ?? 'CMS';
?>
<div style="font-family:'Mukta Malar',Arial,sans-serif;max-width:560px;margin:0 auto;color:#1a1a1a;">
  <div style="background:#0b2f7a;color:#fff;padding:16px 20px;border-radius:12px 12px 0 0;">
    <h2 style="margin:0;font-size:20px;"><?= e($siteName) ?> — உறுப்பினர் அட்டை</h2>
  </div>
  <div style="border:1px solid #d6e0f0;border-top:none;padding:20px;border-radius:0 0 12px 12px;background:#fff;">
    <p>வணக்கம் <strong><?= e($member['name'] ?? '') ?></strong>,</p>
    <p>உங்கள் உறுப்பினர் பதிவு வெற்றிகரமாக முடிந்தது.</p>
    <p style="font-size:18px;margin:18px 0;">
      உறுப்பினர் எண்:
      <strong style="color:#0b2f7a;letter-spacing:.06em;"><?= e($member['membership_id'] ?? '') ?></strong>
    </p>
    <p>இந்த மின்னஞ்சலுடன் உங்கள் உறுப்பினர் அட்டை இணைக்கப்பட்டுள்ளது:</p>
    <ul style="padding-left:18px;margin:10px 0 18px;color:#333;">
      <li><strong>Front.png</strong> — அட்டை முன் பக்கம்</li>
      <li><strong>Back.png</strong> — உங்கள் விவரங்கள் நிரப்பப்பட்ட பின் பக்கம் (card-back.png)</li>
    </ul>
    <p>
      <a href="<?= e($cardUrl) ?>" style="display:inline-block;background:#0b2f7a;color:#fff;padding:10px 18px;border-radius:999px;text-decoration:none;font-weight:700;">
        உறுப்பினர் அட்டை பார்க்க / அச்சிட
      </a>
    </p>
    <p style="color:#666;font-size:13px;margin-top:24px;">இந்த மின்னஞ்சல் தானாக அனுப்பப்பட்டது. பதில் அனுப்ப வேண்டாம்.</p>
  </div>
</div>
