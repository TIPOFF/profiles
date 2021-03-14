<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Tests\Unit\Migrations;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Tipoff\Profiles\Tests\TestCase;

class PermissionsMigrationTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function permissions_seeded()
    {
        $this->assertTrue(Schema::hasTable('permissions'));

        $seededPermissions = app(Permission::class)->whereIn('name', [
            'view profiles',
            'create profiles',
            'update profiles',
            'view profile links',
            'create profile links',
            'update profile links',
            'delete profile links',
        ])->pluck('name');

        $this->assertCount(3, $seededPermissions);
    }
}
