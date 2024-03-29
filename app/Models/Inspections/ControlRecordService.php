<?php

namespace App\Models\Inspections;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class ControlRecordService extends Model implements Auditable
{
    use AuditableTrait;

    protected $connection = 'control_prod';

    protected $table = 'control_records_services';

    protected $fillable = [
        'control_records_id',
        'complementary_services_id',
        'complete',
    ];

    public function complementaryService(): BelongsTo
    {
        return $this->belongsTo(ComplementaryService::class, 'complementary_services_id');
    }

    public function complementaryServices(): HasMany
    {
        return $this->hasMany(ComplementaryService::class, 'id', 'complementary_services_id');
    }
}
