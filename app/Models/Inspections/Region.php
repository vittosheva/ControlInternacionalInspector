<?php

namespace App\Models\Inspections;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $connection = 'control_prod';

    protected $table = 'regions';

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new IsActiveScope());
    }
}
