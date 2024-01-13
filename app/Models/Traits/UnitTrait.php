<?php

namespace App\Models\Traits;

use App\Models\Setting\Unit;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait UnitTrait
{
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_code', 'code');
    }
}
