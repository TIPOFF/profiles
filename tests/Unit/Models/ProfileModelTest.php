<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Tests\Unit\Models;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tipoff\Profiles\Models\Profile;
use Tipoff\Profiles\Tests\TestCase;

class ProfileModelTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function create()
    {
        $model = Profile::factory()->create();
        $this->assertNotNull($model);
    }
}
