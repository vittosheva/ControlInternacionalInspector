<?php

namespace App\Models\Inspections;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ControlRecordService extends Model
{
    protected $connection = 'control_prod';

    protected $table = 'control_records_services';

    public function complementaryService(): BelongsTo
    {
        return $this->belongsTo(ComplementaryService::class, 'complementary_services_id');
    }
}
