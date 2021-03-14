<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Tipoff\Profiles\Models\Profile;
use Tipoff\Profiles\Models\ProfileLink;
use Tipoff\Seo\Models\Webpage;

class ProfileLinkFactory extends Factory
{
    protected $model = ProfileLink::class;

    public function definition()
    {

        return [
            'type' => $this->faker->randomElement(['Facebook','Google','Instagram']),
            'webpage_id' => Webpage::factory()->create()->id,
            'profile_id' => Profile::factory()->create()->id,
            'priority' => $this->faker->numberBetween(1,100),
            'creator_id' => randomOrCreate(app('user')),
            'updater_id' => randomOrCreate(app('user')),
        ];
    }
}
