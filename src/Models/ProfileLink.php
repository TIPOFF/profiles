<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasCreator;
use Tipoff\Support\Traits\HasPackageFactory;
use Tipoff\Support\Traits\HasUpdater;

class ProfileLink extends BaseModel
{
    use HasCreator;
    use HasPackageFactory;
    use HasUpdater;
    use SoftDeletes;

    public function profile()
    {
        return $this->belongsTo(app('profile'));
    }

    public function webpage()
    {
        return $this->belongsTo(app('webpage'));
    }
}
