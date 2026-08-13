<?php
use App\Core\Session;
use App\Core\View;

$errors = Session::flash('errors') ?? [];
$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'தொடர்பு', 'url' => ''],
];
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1>தொடர்பு கொள்ளுங்கள்</h1>
<p><?= e(setting('contact_intro', 'உங்கள் கருத்துகள், கேள்விகள் அல்லது புகார்களை எங்களுக்கு அனுப்புங்கள்.')) ?></p>
</div>
</div>

<section>
<div class="wrap">
<div class="contact-layout">
<div class="contact-info">
<?php if (!empty($settings['site_address'])): ?>
<div class="contact-block">
<h3>முகவரி</h3>
<p><?= e($settings['site_address']) ?></p>
</div>
<?php endif; ?>
<?php if (!empty($settings['site_phone'])): ?>
<div class="contact-block">
<h3>தொலைபேசி</h3>
<p><a href="tel:<?= e(preg_replace('/\s+/', '', $settings['site_phone'])) ?>"><?= e($settings['site_phone']) ?></a></p>
</div>
<?php endif; ?>
<?php if (!empty($settings['site_email'])): ?>
<div class="contact-block">
<h3>மின்னஞ்சல்</h3>
<p><a href="mailto:<?= e($settings['site_email']) ?>"><?= e($settings['site_email']) ?></a></p>
</div>
<?php endif; ?>
</div>

<div class="side-card contact-form-card">
<h3>செய்தி அனுப்புங்கள்</h3>
<form action="<?= e(url('/contact')) ?>" method="post" class="contact-form">
<?= csrf_field() ?>
<div class="field">
<label for="name">பெயர் / Name *</label>
<input type="text" id="name" name="name" value="<?= e(old('name')) ?>" required>
<?php if (!empty($errors['name'])): ?><span class="field-error"><?= e($errors['name'][0] ?? '') ?></span><?php endif; ?>
</div>
<div class="field">
<label for="email">மின்னஞ்சல் / Email *</label>
<input type="email" id="email" name="email" value="<?= e(old('email')) ?>" required>
<?php if (!empty($errors['email'])): ?><span class="field-error"><?= e($errors['email'][0] ?? '') ?></span><?php endif; ?>
</div>
<div class="field">
<label for="phone">தொலைபேசி / Phone</label>
<input type="text" id="phone" name="phone" value="<?= e(old('phone')) ?>">
</div>
<div class="field">
<label for="subject">தலைப்பு / Subject</label>
<input type="text" id="subject" name="subject" value="<?= e(old('subject')) ?>">
</div>
<div class="field">
<label for="message">செய்தி / Message *</label>
<textarea id="message" name="message" rows="6" required><?= e(old('message')) ?></textarea>
<?php if (!empty($errors['message'])): ?><span class="field-error"><?= e($errors['message'][0] ?? '') ?></span><?php endif; ?>
</div>
<button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">அனுப்பு / Send</button>
</form>
</div>
</div>
</div>
</section>
