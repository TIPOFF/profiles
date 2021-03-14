<?php

declare(strict_types=1);

use Tipoff\Authorization\Permissions\BasePermissionsMigration;

class AddProfilesPermissions extends BasePermissionsMigration
{
    public function up()
    {
        $permissions = [
            'view profiles' => ['Owner', 'Staff'],
            'create profiles' => ['Owner'],
            'update profiles' => ['Owner'],
            'view profile links' => ['Owner', 'Staff'],
            'create profile links' => ['Owner'],
            'update profile links' => ['Owner'],
            'delete profile links' => ['Owner'],
        ];

        $this->createPermissions($permissions);
    }
}
