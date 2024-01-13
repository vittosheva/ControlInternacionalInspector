<?php

namespace App\Models\Core;

use App\Models\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Wildside\Userstamps\Userstamps;

class CompanySetting extends Model implements Auditable
{
    use AuditableTrait;
    use CompanyTrait;
    use SoftDeletes;
    use Userstamps;

    protected $connection = 'mysql';

    protected $fillable = [
        'company_id',
        'label',
        'key',
        'value',
        'attributes',
    ];

    protected $casts = [
        'attributes' => 'json',
    ];
}
