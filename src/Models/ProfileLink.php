<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Models;

use Tipoff\Seo\Models\Webpage;
use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasCreator;
use Tipoff\Support\Traits\HasPackageFactory;
use Tipoff\Support\Traits\HasUpdater;

class ProfileLink extends BaseModel
{
    use HasCreator;
    use HasPackageFactory;
    use HasUpdater;

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($profile) {
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function webpages()
    {
        return $this->belongsTo(Webpage::class);
    }
}
