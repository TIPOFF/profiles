<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Tests\Unit\Models;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tipoff\Profiles\Models\ProfileLink;
use Tipoff\Profiles\Tests\TestCase;

class ProfileLinkModelTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function create()
    {
        $model = ProfileLink::factory()->create();
        $this->assertNotNull($model);
    }
}
