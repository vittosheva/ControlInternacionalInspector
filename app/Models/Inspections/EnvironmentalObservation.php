<?php

namespace App\Models\Inspections;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;

class EnvironmentalObservation extends Model
{
    protected $connection = 'control_prod';

    protected $table = 'environmental_observations';

    protected $fillable = [
        'code',
        'description',
        'active',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new IsActiveScope());
    }
}
