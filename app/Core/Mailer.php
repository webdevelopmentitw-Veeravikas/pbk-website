<?php

declare(strict_types=1);

namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

/**
 * PHPMailer wrapper — uses config/mail.php or DB settings.
 */
final class Mailer
{
    private PHPMailer $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
        $cfg = require CONFIG_PATH . '/mail.php';

        // Override from settings table when available
        try {
            $db = Database::getInstance();
            $rows = $db->fetchAll("SELECT `key`, `value` FROM settings WHERE `group` = 'smtp' OR `key` LIKE 'smtp_%' OR `key` IN ('site_email','site_name')");
            $map = [];
            foreach ($rows as $r) {
                $map[$r['key']] = $r['value'];
            }
            if (!empty($map['smtp_host'])) {
                $cfg['host'] = $map['smtp_host'];
            }
            if (!empty($map['smtp_port'])) {
                $cfg['port'] = (int) $map['smtp_port'];
            }
            if (!empty($map['smtp_username'])) {
                $cfg['username'] = $map['smtp_username'];
            }
            if (!empty($map['smtp_password'])) {
                $cfg['password'] = $map['smtp_password'];
            }
            if (!empty($map['smtp_encryption'])) {
                $cfg['encryption'] = $map['smtp_encryption'];
            }
            if (!empty($map['site_email'])) {
                $cfg['from_email'] = $map['site_email'];
            }
            if (!empty($map['site_name'])) {
                $cfg['from_name'] = $map['site_name'];
            }
        } catch (\Throwable) {
            // DB may not be ready during install
        }

        $this->mailer->isSMTP();
        $this->mailer->Host       = $cfg['host'];
        $this->mailer->SMTPAuth   = !empty($cfg['username']);
        $this->mailer->Username   = $cfg['username'];
        $this->mailer->Password   = $cfg['password'];
        $this->mailer->SMTPSecure = $cfg['encryption'] ?: PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port       = (int) $cfg['port'];
        $this->mailer->CharSet    = 'UTF-8';
        $this->mailer->setFrom($cfg['from_email'], $cfg['from_name']);
    }

    public function send(string $to, string $subject, string $body, ?string $toName = null, array $attachments = []): bool
    {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->clearAttachments();
            $this->mailer->addAddress($to, $toName ?? '');
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body    = $body;
            $this->mailer->AltBody = strip_tags($body);

            foreach ($attachments as $attachment) {
                if (is_string($attachment) && is_file($attachment)) {
                    $this->mailer->addAttachment($attachment, basename($attachment));
                    continue;
                }
                if (!is_array($attachment)) {
                    continue;
                }
                $path = $attachment['path'] ?? '';
                if (!$path || !is_file($path)) {
                    continue;
                }
                $this->mailer->addAttachment(
                    $path,
                    $attachment['name'] ?? basename($path),
                    $attachment['encoding'] ?? 'base64',
                    $attachment['type'] ?? ''
                );
            }

            return $this->mailer->send();
        } catch (MailException $e) {
            logger('mail_error', $e->getMessage());
            return false;
        }
    }

    public function sendView(string $to, string $subject, string $view, array $data = []): bool
    {
        $body = View::render('emails.' . $view, $data);
        return $this->send($to, $subject, $body);
    }
}
