<?php

namespace App\Models\Inspections;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HoseType extends Model
{
    protected $connection = 'control_prod';

    protected $table = 'hose_types';

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new IsActiveScope());
    }

    public function hose(): BelongsTo
    {
        return $this->belongsTo(Hose::class);
    }
}
