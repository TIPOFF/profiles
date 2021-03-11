<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Tests\Support\Providers;

use Tipoff\Profiles\Nova\Competitor;
use Tipoff\Profiles\Nova\Insight;
use Tipoff\Profiles\Nova\Review;
use Tipoff\Profiles\Nova\Snapshot;
use Tipoff\TestSupport\Providers\BaseNovaPackageServiceProvider;

class NovaTestbenchServiceProvider extends BaseNovaPackageServiceProvider
{
    public static array $packageResources = [
        Competitor::class,
        Insight::class,
        Review::class,
        Snapshot::class,
    ];
}
