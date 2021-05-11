<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Tipoff\Support\Nova\BaseResource;

class ProfileLink extends BaseResource
{
    public static $model = \Tipoff\Profiles\Models\ProfileLink::class;

    public static $title = 'id';

    public static $search = [
        'id', 'type', 'priority',
    ];

    public static $group = 'Resources';

    public function fieldsForIndex(NovaRequest $request)
    {
        return array_filter([
            ID::make()->sortable(),
            Text::make('Type')->sortable(),
            Number::make('Priority')->sortable(),
        ]);
    }

    public function fields(Request $request)
    {
        return array_filter([
            Text::make('Type')->help('eg. Website, Facebook, Twitter, Instagram')
                ->rules('required')
                ->creationRules("unique:profile_links,type,NULL,id,profile_id,$request->profile")
                ->updateRules("unique:profile_links,type,{{resourceId}},id,profile_id,$request->profile"),
            Number::make('Priority')->min(0)->max(100)->rules('required'),
            nova('profile') ?
                BelongsTo::make('Profile', 'profile', nova('profile'))
                    ->creationRules("unique:profile_links,profile_id,NULL,id,type,$request->type")
                    ->updateRules("unique:profile_links,profile_id,{{resourceId}},id,type,$request->type")
             : null,
            nova('webpage') ? BelongsTo::make('Webpage', 'webpage', nova('webpage')) : null,
        ]);
    }

    protected function dataFields(): array
    {
        return array_merge(
            parent::dataFields(),
            $this->creatorDataFields(),
            $this->updaterDataFields(),
        );
    }
}
