<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Tipoff\Profiles\Models\Profile;
use Tipoff\Authorization\Models\User;
use Tipoff\Profiles\Models\ProfileLink;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        $user = User::factory()->create();

        return [
            'bio' => $this->faker->text(200),
            'profileable_id' => $user->id,
            'profileable_type' => get_class($user),
            'profile_link_id' => ProfileLink::factory(),
            'creator_id' => randomOrCreate(app('user')),
            'updater_id' => randomOrCreate(app('user')),
        ];
    }
}
