<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Upload;
use App\Models\ActivityLog;
use App\Models\Role;
use App\Models\User;

class UserController extends BaseAdminController
{
    public function index(): void
    {
        $this->view('admin.users.index', [
            'users' => (new User())->allWithRoles(),
        ], 'admin.layouts.app');
    }

    public function create(): void
    {
        $this->view('admin.users.create', [
            'roles' => (new Role())->all('name ASC'),
        ], 'admin.layouts.app');
    }

    public function store(): void
    {
        $data = $this->validate($this->request->all(), [
            'name'     => 'required|max:150',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role_id'  => 'required|numeric',
        ]);

        $upload = new Upload();
        $avatar = null;
        if ($file = $this->request->file('avatar')) {
            $stored = $upload->store($file, 'avatars');
            $avatar = $stored['path'] ?? null;
        }

        $model = new User();
        $id = $model->create([
            'role_id'  => (int) $data['role_id'],
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Auth::hashPassword($data['password']),
            'avatar'   => $avatar,
            'phone'    => $this->request->post('phone'),
            'bio'      => $this->request->post('bio'),
            'status'   => $this->boolVal($this->request->post('status', 1)),
        ]);

        ActivityLog::record(Auth::id(), 'user_create', "Created user #{$id}: {$data['email']}");
        $this->flash('success', 'User created.');
        $this->redirect(url('/admin/users'));
    }

    public function edit(int $id): void
    {
        $user = (new User())->withRole($id);
        if (!$user) {
            $this->notFound();
        }

        $this->view('admin.users.edit', [
            'user'  => $user,
            'roles' => (new Role())->all('name ASC'),
        ], 'admin.layouts.app');
    }

    public function update(int $id): void
    {
        $model = new User();
        $user = $model->find($id);
        if (!$user) {
            $this->notFound();
        }

        $rules = [
            'name'    => 'required|max:150',
            'email'   => 'required|email|unique:users,email,' . $id,
            'role_id' => 'required|numeric',
        ];

        if ($this->request->post('password')) {
            $rules['password'] = 'min:8|confirmed';
        }

        $data = $this->validate($this->request->all(), $rules);
        $upload = new Upload();

        $update = [
            'role_id' => (int) $data['role_id'],
            'name'    => $data['name'],
            'email'   => $data['email'],
            'phone'   => $this->request->post('phone'),
            'bio'     => $this->request->post('bio'),
            'status'  => $this->boolVal($this->request->post('status', 1)),
        ];

        if (!empty($data['password'])) {
            $update['password'] = Auth::hashPassword($data['password']);
        }

        if ($file = $this->request->file('avatar')) {
            $stored = $upload->store($file, 'avatars');
            if ($stored) {
                $upload->delete($user['avatar'] ?? null);
                $update['avatar'] = $stored['path'];
            }
        }

        $model->update($id, $update);
        ActivityLog::record(Auth::id(), 'user_update', "Updated user #{$id}");
        $this->flash('success', 'User updated.');
        $this->redirect(url('/admin/users/' . $id . '/edit'));
    }

    public function destroy(int $id): void
    {
        if (!Auth::isSuperAdmin()) {
            if ($this->request->isAjax()) {
                $this->json(['success' => false, 'message' => 'Only super admins can delete users.'], 403);
            }
            $this->flash('danger', 'Only super admins can delete users.');
            $this->redirect(url('/admin/users'));
        }

        if ($id === Auth::id()) {
            if ($this->request->isAjax()) {
                $this->json(['success' => false, 'message' => 'You cannot delete your own account.'], 422);
            }
            $this->flash('danger', 'You cannot delete your own account.');
            $this->redirect(url('/admin/users'));
        }

        $model = new User();
        $user = $model->find($id);
        if (!$user) {
            $this->notFound();
        }

        (new Upload())->delete($user['avatar'] ?? null);
        $model->delete($id);

        ActivityLog::record(Auth::id(), 'user_delete', "Deleted user #{$id}: {$user['email']}");
        $this->respondDestroy('User deleted.', url('/admin/users'));
    }
}
