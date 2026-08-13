<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Upload;
use App\Models\ActivityLog;
use App\Models\OrganizationMember;
use App\Models\OrganizationTeam;

class OrganizationMemberController extends BaseAdminController
{
    public function index(): void
    {
        $filters = [
            'q' => trim((string) $this->request->get('q', '')),
            'team_id' => $this->request->get('team_id', ''),
            'district' => $this->request->get('district', ''),
            'status' => $this->request->get('status', ''),
        ];
        $page = max(1, (int) $this->request->get('page', 1));

        // Admin listing: don't force status=1 when empty
        $searchFilters = $filters;
        if ($searchFilters['status'] === '') {
            unset($searchFilters['status']);
            // Override model default by passing status blank via custom query
        }

        $memberModel = new OrganizationMember();
        if (($filters['status'] ?? '') === '') {
            $where = ['1=1'];
            $params = [];
            if ($filters['q'] !== '') {
                $like = '%' . $filters['q'] . '%';
                $where[] = '(m.name LIKE :q1 OR m.tamil_name LIKE :q2 OR m.english_name LIKE :q3 OR m.designation LIKE :q4)';
                $params = ['q1' => $like, 'q2' => $like, 'q3' => $like, 'q4' => $like];
            }
            if ($filters['team_id'] !== '') {
                $where[] = 'm.team_id = :team_id';
                $params['team_id'] = (int) $filters['team_id'];
            }
            if ($filters['district'] !== '') {
                $where[] = 'm.district = :district';
                $params['district'] = $filters['district'];
            }
            $whereSql = implode(' AND ', $where);
            $perPage = 20;
            $offset = ($page - 1) * $perPage;
            $total = (int) ($memberModel->queryOne("SELECT COUNT(*) AS cnt FROM organization_members m WHERE {$whereSql}", $params)['cnt'] ?? 0);
            $rows = $memberModel->query(
                "SELECT m.*, t.name AS team_name FROM organization_members m
                 INNER JOIN organization_teams t ON t.id = m.team_id
                 WHERE {$whereSql}
                 ORDER BY m.sort_order ASC, m.id DESC
                 LIMIT {$perPage} OFFSET {$offset}",
                $params
            );
            $pager = [
                'data' => $rows,
                'total' => $total,
                'per_page' => $perPage,
                'current_page' => $page,
                'last_page' => (int) max(1, ceil($total / $perPage)),
            ];
        } else {
            $pager = $memberModel->search($searchFilters, $page, 20);
        }

        $this->view('admin.organization.members.index', [
            'members' => $pager,
            'teams' => (new OrganizationTeam())->all('sort_order ASC, name ASC'),
            'districts' => $memberModel->distinctValues('district'),
            'filters' => $filters,
        ], 'admin.layouts.app');
    }

    public function create(): void
    {
        $this->view('admin.organization.members.create', [
            'teams' => (new OrganizationTeam())->all('sort_order ASC, name ASC'),
            'preselectTeam' => (int) $this->request->get('team_id', 0),
        ], 'admin.layouts.app');
    }

    public function store(): void
    {
        $data = $this->validate($this->request->all(), [
            'team_id' => 'required|numeric',
            'name' => 'required|max:200',
        ]);

        $upload = new Upload();
        $id = (new OrganizationMember())->create($this->payload($data, $upload));

        ActivityLog::record(Auth::id(), 'org_member_create', "Created member #{$id}");
        $this->flash('success', 'Member created.');
        $this->redirect(url('/admin/organization/members'));
    }

    public function edit(int $id): void
    {
        $member = (new OrganizationMember())->find($id);
        if (!$member) {
            $this->notFound();
        }
        $this->view('admin.organization.members.edit', [
            'member' => $member,
            'teams' => (new OrganizationTeam())->all('sort_order ASC, name ASC'),
        ], 'admin.layouts.app');
    }

    public function update(int $id): void
    {
        $model = new OrganizationMember();
        $member = $model->find($id);
        if (!$member) {
            $this->notFound();
        }

        $data = $this->validate($this->request->all(), [
            'team_id' => 'required|numeric',
            'name' => 'required|max:200',
        ]);

        $upload = new Upload();
        $payload = $this->payload($data, $upload, $member);
        $model->update($id, $payload);

        ActivityLog::record(Auth::id(), 'org_member_update', "Updated member #{$id}");
        $this->flash('success', 'Member updated.');
        $this->redirect(url('/admin/organization/members'));
    }

    public function destroy(int $id): void
    {
        $model = new OrganizationMember();
        $member = $model->find($id);
        if (!$member) {
            $this->notFound();
        }
        $upload = new Upload();
        $upload->delete($member['photo'] ?? null);
        $upload->delete($member['cover_image'] ?? null);
        $model->delete($id);
        ActivityLog::record(Auth::id(), 'org_member_delete', "Deleted member #{$id}");
        $this->respondDestroy('Member deleted.', url('/admin/organization/members'));
    }

    public function toggle(int $id): void
    {
        $model = new OrganizationMember();
        $member = $model->find($id);
        if (!$member) {
            $this->notFound();
        }
        $new = (int) $member['status'] === 1 ? 0 : 1;
        $model->update($id, ['status' => $new]);
        $this->json(['success' => true, 'status' => $new]);
    }

    public function reorder(): void
    {
        $ids = $this->request->post('ids') ?? $this->request->json()['ids'] ?? [];
        if (!is_array($ids)) {
            $this->json(['success' => false, 'message' => 'Invalid'], 422);
        }
        (new OrganizationMember())->reorder($ids);
        $this->json(['success' => true]);
    }

    public function bulk(): void
    {
        $action = (string) $this->request->post('action', '');
        $ids = $this->request->post('ids') ?? [];
        if (!is_array($ids) || empty($ids)) {
            $this->json(['success' => false, 'message' => 'No items selected'], 422);
        }

        $model = new OrganizationMember();
        $count = match ($action) {
            'enable' => $model->bulkStatus($ids, 1),
            'disable' => $model->bulkStatus($ids, 0),
            'delete' => $model->bulkDelete($ids),
            default => 0,
        };

        ActivityLog::record(Auth::id(), 'org_member_bulk', "Bulk {$action}: {$count}");
        $this->json(['success' => true, 'message' => "Updated {$count} members.", 'count' => $count]);
    }

    public function export(): void
    {
        $rows = (new OrganizationMember())->query(
            'SELECT m.*, t.name AS team_name
             FROM organization_members m
             INNER JOIN organization_teams t ON t.id = m.team_id
             ORDER BY t.sort_order ASC, m.sort_order ASC'
        );

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="organization_members_' . date('Ymd') . '.csv"');
        echo "\xEF\xBB\xBF";
        $out = fopen('php://output', 'w');
        fputcsv($out, [
            'id', 'team', 'name', 'tamil_name', 'english_name', 'designation', 'position',
            'assembly', 'parliament', 'district', 'state', 'zone', 'phone', 'email',
            'featured', 'status', 'joining_date',
        ]);
        foreach ($rows as $r) {
            fputcsv($out, [
                $r['id'], $r['team_name'], $r['name'], $r['tamil_name'], $r['english_name'],
                $r['designation'], $r['position'], $r['assembly'], $r['parliament'],
                $r['district'], $r['state'], $r['zone'], $r['phone'], $r['email'],
                $r['featured'], $r['status'], $r['joining_date'],
            ]);
        }
        fclose($out);
        exit;
    }

    public function import(): void
    {
        $file = $this->request->file('csv_file');
        if (!$file || ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            $this->flash('danger', 'Please upload a CSV file.');
            $this->redirect(url('/admin/organization/members'));
        }

        $handle = fopen($file['tmp_name'], 'r');
        if (!$handle) {
            $this->flash('danger', 'Unable to read file.');
            $this->redirect(url('/admin/organization/members'));
        }

        $header = fgetcsv($handle);
        $teamModel = new OrganizationTeam();
        $memberModel = new OrganizationMember();
        $imported = 0;

        while (($row = fgetcsv($handle)) !== false) {
            $map = array_combine($header ?: [], $row);
            if (!$map || empty($map['name'])) {
                continue;
            }
            $teamName = trim((string) ($map['team'] ?? ''));
            $team = $teamName !== '' ? $teamModel->findBy('name', $teamName) : null;
            if (!$team && !empty($map['team_id'])) {
                $team = $teamModel->find((int) $map['team_id']);
            }
            if (!$team) {
                continue;
            }
            $memberModel->create([
                'team_id' => (int) $team['id'],
                'name' => $map['name'],
                'tamil_name' => $map['tamil_name'] ?? null,
                'english_name' => $map['english_name'] ?? null,
                'designation' => $map['designation'] ?? null,
                'position' => $map['position'] ?? null,
                'assembly' => $map['assembly'] ?? null,
                'parliament' => $map['parliament'] ?? null,
                'district' => $map['district'] ?? null,
                'state' => $map['state'] ?? 'தமிழ்நாடு',
                'zone' => $map['zone'] ?? null,
                'phone' => $map['phone'] ?? null,
                'email' => $map['email'] ?? null,
                'featured' => (int) ($map['featured'] ?? 0),
                'status' => (int) ($map['status'] ?? 1),
                'joining_date' => $map['joining_date'] ?? null,
                'sort_order' => 0,
            ]);
            $imported++;
        }
        fclose($handle);

        ActivityLog::record(Auth::id(), 'org_member_import', "Imported {$imported} members");
        $this->flash('success', "Imported {$imported} members.");
        $this->redirect(url('/admin/organization/members'));
    }

    private function payload(array $data, Upload $upload, ?array $existing = null): array
    {
        $payload = [
            'team_id' => (int) $data['team_id'],
            'name' => $data['name'],
            'tamil_name' => $this->request->post('tamil_name'),
            'english_name' => $this->request->post('english_name'),
            'designation' => $this->request->post('designation'),
            'position' => $this->request->post('position'),
            'assembly' => $this->request->post('assembly'),
            'parliament' => $this->request->post('parliament'),
            'district' => $this->request->post('district'),
            'state' => $this->request->post('state') ?: 'தமிழ்நாடு',
            'zone' => $this->request->post('zone'),
            'phone' => $this->request->post('phone'),
            'email' => $this->request->post('email'),
            'whatsapp' => $this->request->post('whatsapp'),
            'facebook' => $this->request->post('facebook'),
            'twitter' => $this->request->post('twitter'),
            'instagram' => $this->request->post('instagram'),
            'youtube' => $this->request->post('youtube'),
            'website' => $this->request->post('website'),
            'biography' => $this->request->post('biography'),
            'joining_date' => $this->request->post('joining_date') ?: null,
            'sort_order' => (int) ($this->request->post('sort_order') ?? 0),
            'featured' => $this->request->has('featured') ? $this->boolVal($this->request->post('featured')) : 0,
            'status' => $this->request->has('status') ? $this->boolVal($this->request->post('status')) : 0,
        ];

        $photo = $this->storeImage($upload, 'photo');
        if ($photo) {
            if ($existing) {
                $upload->delete($existing['photo'] ?? null);
            }
            $payload['photo'] = $photo;
        }
        $cover = $this->storeImage($upload, 'cover_image');
        if ($cover) {
            if ($existing) {
                $upload->delete($existing['cover_image'] ?? null);
            }
            $payload['cover_image'] = $cover;
        }

        return $payload;
    }

    private function storeImage(Upload $upload, string $field): ?string
    {
        $file = $this->request->file($field);
        if (!$file || ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            return null;
        }
        $stored = $upload->store($file, 'organization', true);
        return $stored['path'] ?? null;
    }
}
