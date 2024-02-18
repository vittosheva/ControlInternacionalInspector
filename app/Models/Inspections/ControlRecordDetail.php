<?php

namespace App\Models\Inspections;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class ControlRecordDetail extends Model implements Auditable
{
    use AuditableTrait;

    protected $connection = 'control_prod';

    protected $table = 'control_records_detail';

    protected $fillable = [
        'control_record_id', 'hose_id', 'seal_found', 'seal_left', 'quantity', 'observations', 'company_observations',
        'measurement_id', 'measurement_id_sec_1', 'measurement_id_sec_2', 'observation_id', 'company_observation_id',
        'letter_responsable_id', 'letter_observations', 'letter_seal', 'totalizator', 'octane', 'measurements_array',
    ];

    protected $casts = [
        'measurements_array' => 'array',
    ];

    public function controlRecord(): BelongsTo
    {
        return $this->belongsTo(ControlRecord::class, 'control_record_id');
    }

    public function hose(): BelongsTo
    {
        return $this->belongsTo(Hose::class, 'hose_id');
    }

    public function measurement(): BelongsTo
    {
        return $this->belongsTo(Measurement::class, 'measurement_id');
    }

    public function measurement2(): BelongsTo
    {
        return $this->belongsTo(Measurement::class, 'measurement_id_sec_1');
    }

    public function observation(): BelongsTo
    {
        return $this->belongsTo(Observation::class, 'observation_id');
    }

    public function observationCompany(): BelongsTo
    {
        return $this->belongsTo(Observation::class, 'company_observation_id');
    }
}
