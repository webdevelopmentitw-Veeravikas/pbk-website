<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Core\Mailer;
use App\Core\Upload;
use App\Models\Member;
use App\Services\MembershipCardGenerator;

class MembershipController extends BaseFrontendController
{
    public function index(): void
    {
        $this->frontendView('frontend.membership.register', [
            'seo' => [
                'title' => 'உறுப்பினர் சேர்க்கை',
                'description' => 'புதிய உறுப்பினர் பதிவு படிவம்',
            ],
            'districts' => $this->districts(),
            'bloodGroups' => ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'],
            'areaTypes' => ['மாநகராட்சி', 'நகராட்சி', 'பேரூராட்சி', 'ஊராட்சி'],
            'contributions' => ['இதில் எதுவும் இல்லை', 'மாதாந்திர', 'ஆண்டு', 'ஒருமுறை'],
        ]);
    }

    public function submit(): void
    {
        $data = $this->validate($this->request->all(), [
            'name'         => 'required|max:150',
            'father_name'  => 'required|max:150',
            'gender'       => 'required|in:ஆண்,பெண்,மற்றவை',
            'dob'          => 'required|min_age:18',
            'country'      => 'required|max:100',
            'phone'        => 'required|max:30',
            'email'        => 'required|email|max:190',
            'state'        => 'required|max:100',
            'district'     => 'required|max:100',
            'constituency' => 'required|max:150',
            'pincode'      => 'required|max:20',
            'area_type'    => 'required|max:100',
            'area_detail'  => 'required|max:150',
            'address'      => 'required',
        ]);

        $photoPath = null;
        $file = $this->request->file('photo');
        if ($file && ($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_OK) {
            try {
                $stored = (new Upload())->store($file, 'members', true);
                $photoPath = $stored['path'] ?? null;
            } catch (\Throwable $e) {
                if ($this->request->isAjax()) {
                    $this->json(['success' => false, 'message' => $e->getMessage()], 422);
                }
                $this->flash('danger', $e->getMessage());
                $this->redirect(url('/membership'));
            }
        }

        $model = new Member();
        $membershipId = $model->generateMembershipId();

        $id = $model->create([
            'membership_id' => $membershipId,
            'photo'         => $photoPath,
            'name'          => $data['name'],
            'father_name'   => $data['father_name'],
            'gender'        => $data['gender'],
            'dob'           => $data['dob'],
            'country'       => $data['country'],
            'phone'         => $data['phone'],
            'whatsapp'      => $this->request->post('whatsapp'),
            'email'         => $data['email'],
            'state'         => $data['state'],
            'district'      => $data['district'],
            'constituency'  => $data['constituency'],
            'pincode'       => $data['pincode'],
            'area_type'     => $data['area_type'],
            'area_detail'   => $data['area_detail'],
            'address'       => $data['address'],
            'temp_address'  => $this->request->post('temp_address'),
            'ward'          => $this->request->post('ward'),
            'voter_id'      => $this->request->post('voter_id'),
            'booth_no'      => $this->request->post('booth_no'),
            'blood_group'   => $this->request->post('blood_group'),
            'contribution'  => $this->request->post('contribution'),
            'status'        => 1,
            'ip_address'    => $this->request->ip(),
        ]);

        $member = $model->find($id);
        $cards = (new MembershipCardGenerator())->generate($member);
        $this->sendWelcomeEmail($member, $cards);

        if ($this->request->isAjax()) {
            $this->json([
                'success' => true,
                'message' => 'பதிவு வெற்றிகரமாக முடிந்தது. அட்டை உங்கள் மின்னஞ்சலுக்கு அனுப்பப்பட்டது.',
                'redirect' => url('/membership/success/' . $membershipId),
                'membership_id' => $membershipId,
            ]);
        }

        $this->redirect(url('/membership/success/' . $membershipId));
    }

    public function success(string $membershipId): void
    {
        $member = (new Member())->findByMembershipId($membershipId);
        if (!$member) {
            $this->notFound('Membership not found.');
        }

        $this->frontendView('frontend.membership.success', [
            'member' => $member,
            'seo' => ['title' => 'பதிவு வெற்றி - ' . $membershipId],
        ]);
    }

    public function card(string $membershipId): void
    {
        $model = new Member();
        $member = $model->findByMembershipId($membershipId);
        if (!$member) {
            $this->notFound('Membership not found.');
        }

        $joined = !empty($member['created_at'])
            ? date('d-m-Y', strtotime((string) $member['created_at']))
            : date('d-m-Y');

        $generator = new MembershipCardGenerator();
        $cards = $generator->generate($member);

        $photoUrl = '';
        if (!empty($member['photo'])) {
            $photoUrl = upload_url((string) $member['photo']);
        }

        echo \App\Core\View::render('frontend.membership.card', [
            'member' => $member,
            'siteName' => setting('site_name', 'CMS'),
            'verifyUrl' => url('/membership/card/' . $member['membership_id']),
            'age' => $model->age($member['dob'] ?? null),
            'joined' => $joined,
            'photoUrl' => $photoUrl,
            'templateFront' => asset('assets/images/membership/card-front.png'),
            'templateBack' => asset('assets/images/membership/card-back.png'),
            'frontUrl' => upload_url($cards['front_url']),
            'backUrl' => upload_url($cards['back_url']),
            'cardFiles' => $cards,
        ]);
    }

    /**
     * @param array{front?:string,back?:string} $cards
     */
    private function sendWelcomeEmail(array $member, array $cards = []): void
    {
        try {
            $cardUrl = url('/membership/card/' . $member['membership_id']);
            $body = \App\Core\View::render('emails.membership_welcome', [
                'member' => $member,
                'cardUrl' => $cardUrl,
                'siteName' => setting('site_name', 'CMS'),
            ]);

            $attachments = [];
            if (!empty($cards['front']) && is_file($cards['front'])) {
                $attachments[] = [
                    'path' => $cards['front'],
                    'name' => ($member['membership_id'] ?? 'member') . '_front.png',
                    'type' => 'image/png',
                ];
            }
            if (!empty($cards['back']) && is_file($cards['back'])) {
                $attachments[] = [
                    'path' => $cards['back'],
                    'name' => ($member['membership_id'] ?? 'member') . '_back.png',
                    'type' => 'image/png',
                ];
            }

            (new Mailer())->send(
                (string) $member['email'],
                'உறுப்பினர் அட்டை - ' . $member['membership_id'],
                $body,
                $member['name'] ?? null,
                $attachments
            );
        } catch (\Throwable $e) {
            logger('membership_mail', $e->getMessage(), ['id' => $member['membership_id'] ?? null]);
        }
    }

    /** @return list<string> */
    private function districts(): array
    {
        return [
            'சென்னை', 'காஞ்சிபுரம்', 'செங்கல்பட்டு', 'திருவள்ளூர்', 'வேலூர்',
            'ராணிப்பேட்டை', 'திருப்பத்தூர்', 'திருவண்ணாமலை', 'கிருஷ்ணகிரி', 'தர்மபுரி',
            'சேலம்', 'நாமக்கல்', 'ஈரோடு', 'திருப்பூர்', 'கோயம்புத்தூர்',
            'நீலகிரி', 'திண்டுக்கல்', 'கரூர்', 'திருச்சிராப்பள்ளி', 'பெரம்பலூர்',
            'அரியலூர்', 'கடலூர்', 'விழுப்புரம்', 'கள்ளக்குறிச்சி', 'மதுரை',
            'தேனி', 'சிவகங்கை', 'ராமநாதபுரம்', 'விருதுநகர்', 'தூத்துக்குடி',
            'திருநெல்வேலி', 'தென்காசி', 'கன்னியாகுமரி', 'நாகப்பட்டினம்', 'மயிலாடுதுறை',
            'தஞ்சாவூர்', 'திருவாரூர்', 'புதுக்கோட்டை', 'புதுச்சேரி',
        ];
    }
}
