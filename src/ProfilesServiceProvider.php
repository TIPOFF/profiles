<?php

declare(strict_types=1);

namespace Tipoff\Profiles;

use Tipoff\Support\TipoffPackage;
use Tipoff\Support\TipoffServiceProvider;

class ProfilesServiceProvider extends TipoffServiceProvider
{
    public function configureTipoffPackage(TipoffPackage $package): void
    {
        $package
            ->name('profiles')
            ->hasViews()
            ->hasConfigFile();
    }
}
