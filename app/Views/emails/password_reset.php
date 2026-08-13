<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background: #1e293b; color: #fff; padding: 20px; text-align: center; border-radius: 8px 8px 0 0;">
        <h1 style="margin: 0; font-size: 22px;"><?= e(setting('site_name', config('app.name', 'CMS Portal'))) ?></h1>
    </div>
    <div style="background: #f8fafc; padding: 30px; border: 1px solid #e2e8f0; border-top: none; border-radius: 0 0 8px 8px;">
        <h2 style="color: #1e293b; margin-top: 0;">Password Reset Request</h2>
        <p>Hello<?= !empty($name) ? ' ' . e($name) : '' ?>,</p>
        <p>You requested a password reset for your admin account. Click the button below to set a new password:</p>
        <p style="text-align: center; margin: 30px 0;">
            <a href="<?= e($resetUrl ?? '#') ?>" style="background: #2563eb; color: #fff; padding: 12px 30px; text-decoration: none; border-radius: 6px; display: inline-block; font-weight: bold;">Reset Password</a>
        </p>
        <p style="font-size: 14px; color: #64748b;">This link will expire in 1 hour. If you did not request this reset, please ignore this email.</p>
        <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 20px 0;">
        <p style="font-size: 12px; color: #94a3b8;">If the button doesn't work, copy and paste this URL into your browser:<br>
        <a href="<?= e($resetUrl ?? '#') ?>" style="color: #2563eb; word-break: break-all;"><?= e($resetUrl ?? '') ?></a></p>
    </div>
</body>
</html>
