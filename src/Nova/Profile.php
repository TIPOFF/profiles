<?php

declare(strict_types=1);

namespace Tipoff\Profiles\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Tipoff\Support\Nova\BaseResource;

class Profile extends BaseResource
{
    public static $model = \Tipoff\Profiles\Models\Profile::class;

    public static $title = 'id';

    public static $search = [
        'id', 'type', 'priority',
    ];

    public static $group = 'Resources';

    public function fieldsForIndex(NovaRequest $request)
    {
        return array_filter([
            ID::make()->sortable(),
            MorphTo::make('Profileable')->types([
                nova('company'),
                nova('location'),
                nova('user'),
            ]),
            Text::make('Bio')->sortable(),
        ]);
    }

    public function fields(Request $request)
    {
        return array_filter([
            MorphTo::make('Profileable')->types([
                nova('company'),
                nova('location'),
                nova('user'),
            ]),
            Text::make('Bio')->rules('required'),
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
