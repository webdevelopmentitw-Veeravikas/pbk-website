<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Upload;
use App\Models\ActivityLog;
use App\Models\OrganizationTeam;

class OrganizationTeamController extends BaseAdminController
{
    public function index(): void
    {
        $this->view('admin.organization.teams.index', [
            'teams' => (new OrganizationTeam())->withMemberCount(null),
        ], 'admin.layouts.app');
    }

    public function create(): void
    {
        $this->view('admin.organization.teams.create', [], 'admin.layouts.app');
    }

    public function store(): void
    {
        $data = $this->validate($this->request->all(), [
            'name' => 'required|max:200',
        ]);

        $model = new OrganizationTeam();
        $slug = $this->uniqueSlug($model, slugify($this->request->post('slug') ?: $data['name']));
        $upload = new Upload();

        $banner = $this->storeImage($upload, 'banner', 'organization');
        $image = $this->storeImage($upload, 'image', 'organization');

        $id = $model->create([
            'name'            => $data['name'],
            'slug'            => $slug,
            'description'     => $this->request->post('description'),
            'banner'          => $banner,
            'image'           => $image,
            'sort_order'      => (int) ($this->request->post('sort_order') ?? 0),
            'status'          => $this->request->has('status') ? $this->boolVal($this->request->post('status')) : 0,
            'seo_title'       => $this->request->post('seo_title'),
            'seo_description' => $this->request->post('seo_description'),
            'seo_keywords'    => $this->request->post('seo_keywords'),
        ]);

        ActivityLog::record(Auth::id(), 'org_team_create', "Created team #{$id}");
        $this->flash('success', 'Team created.');
        $this->redirect(url('/admin/organization/teams'));
    }

    public function edit(int $id): void
    {
        $team = (new OrganizationTeam())->find($id);
        if (!$team) {
            $this->notFound();
        }
        $this->view('admin.organization.teams.edit', ['team' => $team], 'admin.layouts.app');
    }

    public function update(int $id): void
    {
        $model = new OrganizationTeam();
        $team = $model->find($id);
        if (!$team) {
            $this->notFound();
        }

        $data = $this->validate($this->request->all(), [
            'name' => 'required|max:200',
        ]);

        $slug = $this->uniqueSlug(
            $model,
            slugify($this->request->post('slug') ?: $data['name']),
            $id
        );
        $upload = new Upload();

        $payload = [
            'name'            => $data['name'],
            'slug'            => $slug,
            'description'     => $this->request->post('description'),
            'sort_order'      => (int) ($this->request->post('sort_order') ?? 0),
            'status'          => $this->request->has('status') ? $this->boolVal($this->request->post('status')) : 0,
            'seo_title'       => $this->request->post('seo_title'),
            'seo_description' => $this->request->post('seo_description'),
            'seo_keywords'    => $this->request->post('seo_keywords'),
        ];

        if ($banner = $this->storeImage($upload, 'banner', 'organization')) {
            $upload->delete($team['banner'] ?? null);
            $payload['banner'] = $banner;
        }
        if ($image = $this->storeImage($upload, 'image', 'organization')) {
            $upload->delete($team['image'] ?? null);
            $payload['image'] = $image;
        }

        $model->update($id, $payload);
        ActivityLog::record(Auth::id(), 'org_team_update', "Updated team #{$id}");
        $this->flash('success', 'Team updated.');
        $this->redirect(url('/admin/organization/teams'));
    }

    public function destroy(int $id): void
    {
        $model = new OrganizationTeam();
        $team = $model->find($id);
        if (!$team) {
            $this->notFound();
        }

        $upload = new Upload();
        $upload->delete($team['banner'] ?? null);
        $upload->delete($team['image'] ?? null);
        $model->delete($id);

        ActivityLog::record(Auth::id(), 'org_team_delete', "Deleted team #{$id}");
        $this->respondDestroy('Team deleted.', url('/admin/organization/teams'));
    }

    public function toggle(int $id): void
    {
        $model = new OrganizationTeam();
        $team = $model->find($id);
        if (!$team) {
            $this->notFound();
        }
        $new = (int) $team['status'] === 1 ? 0 : 1;
        $model->update($id, ['status' => $new]);
        $this->json(['success' => true, 'status' => $new, 'message' => 'Status updated.']);
    }

    public function reorder(): void
    {
        $ids = $this->request->post('ids') ?? $this->request->json()['ids'] ?? [];
        if (!is_array($ids)) {
            $this->json(['success' => false, 'message' => 'Invalid order'], 422);
        }
        (new OrganizationTeam())->reorder($ids);
        $this->json(['success' => true, 'message' => 'Order saved.']);
    }

    private function storeImage(Upload $upload, string $field, string $folder): ?string
    {
        $file = $this->request->file($field);
        if (!$file || ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            return null;
        }
        $stored = $upload->store($file, $folder, true);
        return $stored['path'] ?? null;
    }
}
