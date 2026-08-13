<?php

declare(strict_types=1);

namespace App\Controllers\Api;

use App\Core\Controller;
use App\Models\OrganizationMember;
use App\Models\OrganizationTeam;

/**
 * JSON API for organization teams & members.
 */
class OrganizationApiController extends Controller
{
    public function teams(): void
    {
        if ($this->request->method() === 'POST') {
            $this->createTeam();
            return;
        }
        $this->json([
            'success' => true,
            'data' => (new OrganizationTeam())->withMemberCount(1),
        ]);
    }

    public function team(int $id): void
    {
        $model = new OrganizationTeam();
        $team = $model->find($id);
        if (!$team) {
            $this->json(['success' => false, 'message' => 'Not found'], 404);
        }

        $method = $this->request->method();
        if ($method === 'PUT' || ($method === 'POST' && strtoupper((string) $this->request->post('_method')) === 'PUT')) {
            $this->updateTeam($id, $team);
            return;
        }
        if ($method === 'DELETE' || ($method === 'POST' && strtoupper((string) $this->request->post('_method')) === 'DELETE')) {
            $model->delete($id);
            $this->json(['success' => true, 'message' => 'Deleted']);
            return;
        }

        $team['members'] = (new OrganizationMember())->byTeam($id, true);
        $this->json(['success' => true, 'data' => $team]);
    }

    public function members(): void
    {
        if ($this->request->method() === 'POST') {
            $this->createMember();
            return;
        }

        $page = max(1, (int) $this->request->get('page', 1));
        $pager = (new OrganizationMember())->search([
            'q' => (string) $this->request->get('q', ''),
            'team_id' => $this->request->get('team_id', ''),
            'district' => (string) $this->request->get('district', ''),
            'assembly' => (string) $this->request->get('assembly', ''),
            'position' => (string) $this->request->get('position', ''),
            'status' => 1,
        ], $page, 30);

        $this->json(['success' => true, 'data' => $pager]);
    }

    public function member(int $id): void
    {
        $model = new OrganizationMember();
        $member = $model->withTeam($id);
        if (!$member) {
            $this->json(['success' => false, 'message' => 'Not found'], 404);
        }

        $method = $this->request->method();
        if ($method === 'PUT' || ($method === 'POST' && strtoupper((string) $this->request->post('_method')) === 'PUT')) {
            $data = $this->request->json() ?: $this->request->all();
            $model->update($id, array_intersect_key($data, array_flip((new OrganizationMember())->fillablePublic())));
            $this->json(['success' => true, 'data' => $model->withTeam($id)]);
            return;
        }
        if ($method === 'DELETE' || ($method === 'POST' && strtoupper((string) $this->request->post('_method')) === 'DELETE')) {
            $model->delete($id);
            $this->json(['success' => true, 'message' => 'Deleted']);
            return;
        }

        $this->json(['success' => true, 'data' => $member]);
    }

    private function createTeam(): void
    {
        $data = $this->request->json() ?: $this->request->all();
        if (empty($data['name'])) {
            $this->json(['success' => false, 'message' => 'Name required'], 422);
        }
        $model = new OrganizationTeam();
        $slug = slugify((string) ($data['slug'] ?? $data['name']));
        $id = $model->create([
            'name' => $data['name'],
            'slug' => $slug,
            'description' => $data['description'] ?? null,
            'sort_order' => (int) ($data['sort_order'] ?? 0),
            'status' => (int) ($data['status'] ?? 1),
            'seo_title' => $data['seo_title'] ?? null,
            'seo_description' => $data['seo_description'] ?? null,
            'seo_keywords' => $data['seo_keywords'] ?? null,
        ]);
        $this->json(['success' => true, 'data' => $model->find($id)], 201);
    }

    private function updateTeam(int $id, array $team): void
    {
        $data = $this->request->json() ?: $this->request->all();
        $model = new OrganizationTeam();
        $payload = [];
        foreach (['name', 'description', 'sort_order', 'status', 'seo_title', 'seo_description', 'seo_keywords', 'slug'] as $key) {
            if (array_key_exists($key, $data)) {
                $payload[$key] = $data[$key];
            }
        }
        if (!empty($payload)) {
            $model->update($id, $payload);
        }
        $this->json(['success' => true, 'data' => $model->find($id)]);
    }

    private function createMember(): void
    {
        $data = $this->request->json() ?: $this->request->all();
        if (empty($data['name']) || empty($data['team_id'])) {
            $this->json(['success' => false, 'message' => 'name and team_id required'], 422);
        }
        $model = new OrganizationMember();
        $id = $model->create([
            'team_id' => (int) $data['team_id'],
            'name' => $data['name'],
            'tamil_name' => $data['tamil_name'] ?? null,
            'english_name' => $data['english_name'] ?? null,
            'designation' => $data['designation'] ?? null,
            'position' => $data['position'] ?? null,
            'assembly' => $data['assembly'] ?? null,
            'district' => $data['district'] ?? null,
            'state' => $data['state'] ?? 'தமிழ்நாடு',
            'status' => (int) ($data['status'] ?? 1),
            'featured' => (int) ($data['featured'] ?? 0),
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ]);
        $this->json(['success' => true, 'data' => $model->withTeam($id)], 201);
    }
}
