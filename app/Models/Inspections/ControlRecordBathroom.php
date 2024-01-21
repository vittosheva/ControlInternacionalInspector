<?php

namespace App\Models\Inspections;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class ControlRecordBathroom extends Model implements Auditable
{
    use AuditableTrait;

    protected $connection = 'control_prod';

    protected $table = 'control_records_bathrooms';

    protected $fillable = [
        'control_records_id',
        'bathroom_compliance_observations_id',
        'men',
        'women',
        'disability_person',
    ];

    public function bathroomComplianceObservation(): BelongsTo
    {
        return $this->belongsTo(BathroomComplianceObservation::class, 'bathroom_compliance_observations_id');
    }

    public function bathroomComplianceObservations(): HasMany
    {
        return $this->hasMany(BathroomComplianceObservation::class, 'id', 'bathroom_compliance_observations_id');
    }
}
