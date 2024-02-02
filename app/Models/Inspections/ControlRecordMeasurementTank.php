<?php

namespace App\Models\Inspections;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class ControlRecordMeasurementTank extends Model implements Auditable
{
    use AuditableTrait;

    protected $connection = 'control_prod';

    protected $table = 'control_records_measurement_tanks';

    protected $fillable = [
        'control_records_id',
        'oil',
        'product',
        'water',
        'order',
    ];
}
