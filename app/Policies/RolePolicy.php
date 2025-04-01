<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;

final class RolePolicy
{
    /**
     * Check if the user is an admin.
     */
    public function isAdmin(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Check if the user is a club member.
     */
    public function isClubMember(User $user): bool
    {
        return $user->hasRole('club_member');
    }

    /**
     * Check if the user is a household.
     */
    public function isHousehold(User $user): bool
    {
        return $user->hasRole('household');
    }

    /**
     * Check if the user is a sponsor.
     */
    public function isSponsor(User $user): bool
    {
        return $user->hasRole('sponsor');
    }
}
