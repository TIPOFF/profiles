<?php

declare(strict_types=1);

use Tipoff\Authorization\Permissions\BasePermissionsMigration;

class AddProfilesPermissions extends BasePermissionsMigration
{
    public function up()
    {
        $permissions = [
            'view profiles' => ['Owner', 'Executive', 'Staff'],
            'create profiles' => ['Owner', 'Executive'],
            'update profiles' => ['Owner', 'Executive'],
            'view profile links' => ['Owner', 'Executive', 'Staff'],
            'create profile links' => ['Owner', 'Executive'],
            'update profile links' => ['Owner', 'Executive'],
            'delete profile links' => ['Owner', 'Executive'],
        ];

        $this->createPermissions($permissions);
    }
}
