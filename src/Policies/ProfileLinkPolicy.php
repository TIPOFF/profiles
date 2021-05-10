<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Tipoff\Profiles\Models\ProfileLink;
use Tipoff\Support\Contracts\Models\UserInterface;

class ProfileLinkPolicy
{
    use HandlesAuthorization;

    public function viewAny(UserInterface $user): bool
    {
        return $user->hasPermissionTo('view profile links');
    }

    public function view(UserInterface $user, ProfileLink $profile_link): bool
    {
        return $user->hasPermissionTo('view profile links');
    }

    public function create(UserInterface $user): bool
    {
        return $user->hasPermissionTo('create profile links');
    }

    public function update(UserInterface $user, ProfileLink $profile_link): bool
    {
        return $user->hasPermissionTo('update profile links');
    }

    public function delete(UserInterface $user, ProfileLink $profile_link): bool
    {
        return $user->hasPermissionTo('delete profile links');
    }

    public function restore(UserInterface $user, ProfileLink $profile_link): bool
    {
        return false;
    }

    public function forceDelete(UserInterface $user, ProfileLink $profile_link): bool
    {
        return false;
    }
}
