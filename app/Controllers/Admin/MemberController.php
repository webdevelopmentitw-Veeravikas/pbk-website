<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Member;

class MemberController extends BaseAdminController
{
    public function index(): void
    {
        $page = max(1, (int) $this->request->get('page', 1));
        $q = trim((string) $this->request->get('q', ''));

        $where = '1=1';
        $params = [];
        if ($q !== '') {
            $where = '(name LIKE :q1 OR email LIKE :q2 OR phone LIKE :q3 OR membership_id LIKE :q4 OR district LIKE :q5)';
            $like = '%' . $q . '%';
            $params = ['q1' => $like, 'q2' => $like, 'q3' => $like, 'q4' => $like, 'q5' => $like];
        }

        $pager = (new Member())->paginate($page, 20, $where, $params, 'id DESC');

        $this->view('admin.members.index', [
            'members' => $pager,
            'q' => $q,
        ], 'admin.layouts.app');
    }

    public function show(int $id): void
    {
        $member = (new Member())->find($id);
        if (!$member) {
            $this->notFound();
        }
        $this->view('admin.members.show', ['member' => $member], 'admin.layouts.app');
    }

    public function destroy(int $id): void
    {
        $model = new Member();
        $member = $model->find($id);
        if (!$member) {
            $this->notFound();
        }
        if (!empty($member['photo'])) {
            (new \App\Core\Upload())->delete($member['photo']);
        }
        $model->delete($id);
        $this->respondDestroy('Member deleted.', url('/admin/members'));
    }
}
