<?php

namespace App\Models\Inspections;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class ControlRecordMeasurementDrawOut extends Model implements Auditable
{
    use AuditableTrait;

    protected $connection = 'control_prod';

    protected $table = 'control_records_measurement_draw_outs';

    protected $fillable = [
        'control_records_id',
        'oil',
        'gallons',
        'order',
    ];
}
