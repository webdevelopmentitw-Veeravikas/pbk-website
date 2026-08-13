<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Core\Mailer;
use App\Models\ContactMessage;
use App\Models\Setting;

class ContactController extends BaseFrontendController
{
    public function index(): void
    {
        $this->frontendView('frontend.contact.index');
    }

    public function submit(): void
    {
        $data = $this->validate($this->request->all(), [
            'name'    => 'required|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'max:50',
            'subject' => 'max:255',
            'message' => 'required|max:5000',
        ]);

        (new ContactMessage())->create([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'phone'   => $this->request->post('phone'),
            'subject' => $this->request->post('subject'),
            'message' => $data['message'],
            'is_read' => 0,
        ]);

        $siteEmail = (new Setting())->get('site_email');
        if ($siteEmail) {
            try {
                $mailer = new Mailer();
                $subject = 'Contact form: ' . ($data['subject'] ?? 'New message');
                $body = sprintf(
                    '<p><strong>Name:</strong> %s</p><p><strong>Email:</strong> %s</p><p><strong>Phone:</strong> %s</p><p><strong>Subject:</strong> %s</p><p><strong>Message:</strong></p><p>%s</p>',
                    e($data['name']),
                    e($data['email']),
                    e((string) $this->request->post('phone', '')),
                    e((string) $this->request->post('subject', '')),
                    nl2br(e($data['message']))
                );
                $mailer->send($siteEmail, $subject, $body, $data['name']);
            } catch (\Throwable $e) {
                logger('mail_error', 'Contact notification failed: ' . $e->getMessage());
            }
        }

        $this->flash('success', 'Thank you! Your message has been sent.');
        $this->redirect(url('/contact'));
    }
}
