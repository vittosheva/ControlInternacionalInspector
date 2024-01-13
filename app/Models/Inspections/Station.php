<?php

namespace App\Models\Inspections;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Station extends Model
{
    protected $connection = 'control_prod';

    protected $table = 'stations';

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new IsActiveScope());
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function hoses(): HasMany
    {
        return $this->hasMany(Hose::class);
    }
}
