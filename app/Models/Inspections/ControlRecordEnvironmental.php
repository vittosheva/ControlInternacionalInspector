<?php

namespace App\Models\Inspections;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class ControlRecordEnvironmental extends Model implements Auditable
{
    use AuditableTrait;

    protected $connection = 'control_prod';

    protected $table = 'control_records_environmentals';

    protected $fillable = [
        'control_records_id',
        'environmental_observations_id',
        'complete',
    ];

    public function environmentalObservation(): BelongsTo
    {
        return $this->belongsTo(EnvironmentalObservation::class, 'environmental_observations_id');
    }

    public function environmentalObservations(): HasMany
    {
        return $this->hasMany(EnvironmentalObservation::class, 'id', 'environmental_observations_id');
    }
}
