<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Member extends Model
{
    protected string $table = 'members';

    protected array $fillable = [
        'membership_id',
        'photo',
        'name',
        'father_name',
        'gender',
        'dob',
        'country',
        'phone',
        'whatsapp',
        'email',
        'state',
        'district',
        'constituency',
        'pincode',
        'area_type',
        'area_detail',
        'address',
        'temp_address',
        'ward',
        'voter_id',
        'booth_no',
        'blood_group',
        'contribution',
        'status',
        'ip_address',
    ];

    public function findByMembershipId(string $membershipId): ?array
    {
        return $this->findBy('membership_id', $membershipId);
    }

    /**
     * Generate unique membership ID: PBK_ + 6 alphanumeric characters.
     * Example: PBK_A7K2M9
     */
    public function generateMembershipId(): string
    {
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; // exclude ambiguous I,O,0,1
        do {
            $suffix = '';
            for ($i = 0; $i < 6; $i++) {
                $suffix .= $chars[random_int(0, strlen($chars) - 1)];
            }
            $id = 'PBK_' . $suffix;
        } while ($this->findByMembershipId($id));

        return $id;
    }

    public function age(?string $dob = null): ?int
    {
        if (!$dob) {
            return null;
        }
        try {
            $birth = new \DateTimeImmutable($dob);
            return (int) $birth->diff(new \DateTimeImmutable('today'))->y;
        } catch (\Throwable) {
            return null;
        }
    }
}
