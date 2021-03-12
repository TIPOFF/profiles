<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Tipoff\Profiles\Models\ProfileLink;
use Tipoff\Seo\Models\Webpage;

class ProfileLinkFactory extends Factory
{
    protected $model = ProfileLink::class;

    public function definition()
    {

        return [
            'type' => $this->faker->randomElement(['Facebook','Twitter','Instagram']),
            'link' => Webpage::factory(),
            'creator_id' => randomOrCreate(app('user')),
            'updater_id' => randomOrCreate(app('user')),
        ];
    }
}
