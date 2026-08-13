<!DOCTYPE html>
<html lang="ta">
<head>
<meta charset="UTF-8">
<title>Contact Form Notification</title>
</head>
<body style="font-family:Arial,sans-serif;line-height:1.6;color:#333;">
<h2 style="color:#2e3192;">New Contact Message</h2>
<p>You have received a new message from the website contact form.</p>
<table style="border-collapse:collapse;width:100%;max-width:560px;">
<tr><td style="padding:8px 0;font-weight:bold;width:120px;">Name</td><td><?= e($name ?? '') ?></td></tr>
<tr><td style="padding:8px 0;font-weight:bold;">Email</td><td><a href="mailto:<?= e($email ?? '') ?>"><?= e($email ?? '') ?></a></td></tr>
<tr><td style="padding:8px 0;font-weight:bold;">Phone</td><td><?= e($phone ?? '—') ?></td></tr>
<tr><td style="padding:8px 0;font-weight:bold;">Subject</td><td><?= e($subject ?? '—') ?></td></tr>
</table>
<h3 style="color:#2e3192;">Message</h3>
<div style="background:#f2f9fd;padding:16px;border-radius:4px;border-left:4px solid #ef383b;">
<?= nl2br(e($message ?? '')) ?>
</div>
<p style="font-size:12px;color:#666;margin-top:24px;">Sent from <?= e(setting('site_name', config('app.name', 'CMS'))) ?> contact form.</p>
</body>
</html>
