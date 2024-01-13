<?php

namespace App\Models\Inspections;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;

class StationType extends Model
{
    protected $connection = 'control_prod';

    protected $table = 'station_types';

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new IsActiveScope());
    }
}
