<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Models\OrganizationMember;
use App\Models\OrganizationTeam;

class OrganizationController extends BaseFrontendController
{
    public function index(): void
    {
        $this->frontendView('frontend.organization.index', [
            'teams' => (new OrganizationTeam())->withMemberCount(1),
            'seo' => [
                'title' => 'அமைப்பு / Organization',
                'description' => 'அமைப்பு அணிகள் மற்றும் பொறுப்பாளர்கள்',
            ],
        ]);
    }

    public function team(string $slug): void
    {
        $team = (new OrganizationTeam())->findBySlug($slug);
        if (!$team || (int) $team['status'] !== 1) {
            $this->notFound();
        }

        $page = max(1, (int) $this->request->get('page', 1));
        $q = trim((string) $this->request->get('q', ''));
        $district = trim((string) $this->request->get('district', ''));
        $assembly = trim((string) $this->request->get('assembly', ''));
        $position = trim((string) $this->request->get('position', ''));

        $pager = (new OrganizationMember())->search([
            'team_id' => (int) $team['id'],
            'q' => $q,
            'district' => $district,
            'assembly' => $assembly,
            'position' => $position,
            'status' => 1,
        ], $page, 24);

        $memberModel = new OrganizationMember();

        $this->frontendView('frontend.organization.team', [
            'team' => $team,
            'members' => $pager,
            'filters' => compact('q', 'district', 'assembly', 'position'),
            'districts' => $memberModel->distinctValues('district'),
            'assemblies' => $memberModel->distinctValues('assembly'),
            'positions' => $memberModel->distinctValues('position'),
            'seo' => [
                'title' => $team['seo_title'] ?: $team['name'],
                'description' => $team['seo_description'] ?: str_limit(strip_tags((string) $team['description']), 160),
                'keywords' => $team['seo_keywords'] ?? '',
            ],
        ]);
    }

    public function member(int $id): void
    {
        $member = (new OrganizationMember())->withTeam($id);
        if (!$member || (int) $member['status'] !== 1) {
            $this->notFound();
        }

        $related = (new OrganizationMember())->related($id, (int) $member['team_id'], 4);

        $this->frontendView('frontend.organization.member', [
            'member' => $member,
            'related' => $related,
            'seo' => [
                'title' => ($member['tamil_name'] ?: $member['name']) . ' - ' . ($member['designation'] ?? ''),
                'description' => str_limit(strip_tags((string) ($member['biography'] ?? '')), 160),
                'og_image' => !empty($member['photo']) ? upload_url($member['photo']) : null,
            ],
        ]);
    }

    public function search(): void
    {
        $page = max(1, (int) $this->request->get('page', 1));
        $filters = [
            'q' => trim((string) $this->request->get('q', '')),
            'team_id' => $this->request->get('team_id', ''),
            'district' => trim((string) $this->request->get('district', '')),
            'assembly' => trim((string) $this->request->get('assembly', '')),
            'position' => trim((string) $this->request->get('position', '')),
            'status' => 1,
        ];

        $memberModel = new OrganizationMember();
        $pager = $memberModel->search($filters, $page, 24);

        $this->frontendView('frontend.organization.search', [
            'members' => $pager,
            'filters' => $filters,
            'teams' => (new OrganizationTeam())->active(),
            'districts' => $memberModel->distinctValues('district'),
            'assemblies' => $memberModel->distinctValues('assembly'),
            'positions' => $memberModel->distinctValues('position'),
            'seo' => ['title' => 'பொறுப்பாளர் தேடல்'],
        ]);
    }
}
