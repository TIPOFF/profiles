<?php

declare(strict_types=1);

namespace Tipoff\Profiles;

use Tipoff\Profiles\Models\Profile;
use Tipoff\Profiles\Models\ProfileLink;
use Tipoff\Profiles\Policies\ProfileLinkPolicy;
use Tipoff\Profiles\Policies\ProfilePolicy;
use Tipoff\Support\TipoffPackage;
use Tipoff\Support\TipoffServiceProvider;

class ProfilesServiceProvider extends TipoffServiceProvider
{
    public function configureTipoffPackage(TipoffPackage $package): void
    {
        $package
            ->hasPolicies([
                Profile::class => ProfilePolicy::class,
                ProfileLink::class => ProfileLinkPolicy::class,
            ])
            ->hasNovaResources([
                \Tipoff\Profiles\Nova\Profile::class,
                \Tipoff\Profiles\Nova\ProfileLink::class,
            ])
            ->name('profiles')
            ->hasConfigFile();
    }
}
