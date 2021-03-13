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
        ];

        $this->createPermissions($permissions);
    }
}
