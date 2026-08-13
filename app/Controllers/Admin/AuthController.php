<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Mailer;
use App\Models\ActivityLog;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm(): void
    {
        if (Auth::check()) {
            $this->redirect(url('/admin'));
        }

        $this->view('admin.auth.login', [], 'admin.layouts.guest');
    }

    public function login(): void
    {
        $data = $this->validate($this->request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (!Auth::attempt($data['email'], $data['password'])) {
            if ($this->request->isAjax()) {
                $this->json(['success' => false, 'message' => 'Invalid credentials or inactive account.'], 422);
            }
            $this->flash('danger', 'Invalid credentials or inactive account.');
            $this->back();
        }

        if ($this->request->isAjax()) {
            $this->json(['success' => true, 'message' => 'Logged in successfully.', 'redirect' => url('/admin')]);
        }

        $this->redirect(url('/admin'));
    }

    public function logout(): void
    {
        Auth::logout();

        if ($this->request->isAjax()) {
            $this->json(['success' => true, 'message' => 'Logged out.', 'redirect' => url('/admin/login')]);
        }

        $this->flash('success', 'You have been logged out.');
        $this->redirect(url('/admin/login'));
    }

    public function forgotForm(): void
    {
        $this->view('admin.auth.forgot', [], 'admin.layouts.guest');
    }

    public function forgot(): void
    {
        $data = $this->validate($this->request->all(), [
            'email' => 'required|email',
        ]);

        $userModel = new User();
        $user = $userModel->findByEmail($data['email']);

        if ($user) {
            $token = bin2hex(random_bytes(32));
            $userModel->update((int) $user['id'], [
                'reset_token'      => $token,
                'reset_expires_at' => date('Y-m-d H:i:s', strtotime('+1 hour')),
            ]);

            $resetUrl = url('/admin/reset-password/' . $token);
            $mailer = new Mailer();
            $sent = $mailer->send(
                $user['email'],
                'Password Reset Request',
                '<p>Click the link below to reset your password:</p><p><a href="' . e($resetUrl) . '">' . e($resetUrl) . '</a></p><p>This link expires in 1 hour.</p>',
                $user['name']
            );

            if (!$sent) {
                $this->flash('info', 'Mail could not be sent. Reset link (local): ' . $resetUrl);
            } else {
                ActivityLog::record((int) $user['id'], 'password_reset_request', 'Password reset requested');
            }
        }

        if ($this->request->isAjax()) {
            $this->json(['success' => true, 'message' => 'If that email exists, a reset link has been sent.']);
        }

        $this->flash('success', 'If that email exists, a reset link has been sent.');
        $this->redirect(url('/admin/forgot-password'));
    }

    public function resetForm(string $token): void
    {
        $user = $this->findValidResetUser($token);
        if (!$user) {
            $this->flash('danger', 'Invalid or expired reset link.');
            $this->redirect(url('/admin/forgot-password'));
        }

        $this->view('admin.auth.reset', ['token' => $token], 'admin.layouts.guest');
    }

    public function reset(): void
    {
        $data = $this->validate($this->request->all(), [
            'token'                 => 'required',
            'password'              => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = $this->findValidResetUser($data['token']);
        if (!$user) {
            if ($this->request->isAjax()) {
                $this->json(['success' => false, 'message' => 'Invalid or expired reset link.'], 422);
            }
            $this->flash('danger', 'Invalid or expired reset link.');
            $this->redirect(url('/admin/forgot-password'));
        }

        $userModel = new User();
        $userModel->update((int) $user['id'], [
            'password'         => Auth::hashPassword($data['password']),
            'reset_token'      => null,
            'reset_expires_at' => null,
        ]);

        ActivityLog::record((int) $user['id'], 'password_reset', 'Password reset completed');

        if ($this->request->isAjax()) {
            $this->json(['success' => true, 'message' => 'Password updated.', 'redirect' => url('/admin/login')]);
        }

        $this->flash('success', 'Password updated. You may now log in.');
        $this->redirect(url('/admin/login'));
    }

    private function findValidResetUser(string $token): ?array
    {
        $userModel = new User();
        $user = $userModel->findBy('reset_token', $token);
        if (!$user || empty($user['reset_expires_at'])) {
            return null;
        }

        if (strtotime($user['reset_expires_at']) < time()) {
            return null;
        }

        return $user;
    }
}
