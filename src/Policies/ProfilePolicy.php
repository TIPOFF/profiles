<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Tipoff\Profiles\Models\Profile;
use Tipoff\Support\Contracts\Models\UserInterface;

class ProfilePolicy
{
    use HandlesAuthorization;

    public function viewAny(UserInterface $user): bool
    {
        return $user->hasPermissionTo('view profiles');
    }

    public function view(UserInterface $user, Profile $profile): bool
    {
        return $user->hasPermissionTo('view profiles');
    }

    public function create(UserInterface $user): bool
    {
        return $user->hasPermissionTo('create profiles');
    }

    public function update(UserInterface $user, Profile $profile): bool
    {
        return $user->hasPermissionTo('update profiles');
    }

    public function delete(UserInterface $user, Profile $profile): bool
    {
        return false;
    }

    public function restore(UserInterface $user, Profile $profile): bool
    {
        return false;
    }

    public function forceDelete(UserInterface $user, Profile $profile): bool
    {
        return false;
    }
}
