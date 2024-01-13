<?php

namespace App\Models\Traits;

use App\Models\Locale\City;
use App\Models\Locale\Country;
use App\Models\Locale\State;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait LocationTrait
{
    public function country(): BelongsTo
    {
        return $this
            ->belongsTo(Country::class)
            ->oldest('name');
    }

    public function state(): BelongsTo
    {
        return $this
            ->belongsTo(State::class)
            ->oldest('name');
    }

    public function city(): BelongsTo
    {
        return $this
            ->belongsTo(City::class)
            ->oldest('name');
    }
}
