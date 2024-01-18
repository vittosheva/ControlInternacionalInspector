<?php

namespace App\Models\Inspections;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;

class InspectionSetting extends Model
{
    protected $connection = 'control_prod';

    protected $table = 'inspection_settings';

    protected $fillable = [
        'name',
        'active',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new IsActiveScope());
    }
}
