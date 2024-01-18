<?php

namespace App\Models\Inspections;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;

class BathroomComplianceObservation extends Model
{
    protected $connection = 'control_prod';

    protected $table = 'bathroom_compliance_observations';

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
