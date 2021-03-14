<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Models;

use Tipoff\Seo\Models\Domain;
use Tipoff\Seo\Models\Webpage;
use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasCreator;
use Tipoff\Support\Traits\HasPackageFactory;
use Tipoff\Support\Traits\HasUpdater;

class Profile extends BaseModel
{
    use HasCreator;
    use HasPackageFactory;
    use HasUpdater;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function profileable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profile_links()
    {
        return $this->hasMany(ProfileLink::class);
    }
}
