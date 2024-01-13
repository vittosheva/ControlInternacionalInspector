<?php

namespace App\Models\Locale;

use App\Models\Scopes\CompanyScope;
use App\Models\Scopes\IsActiveScope;
use App\Models\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Wildside\Userstamps\Userstamps;

class Currency extends Model implements Auditable
{
    use AuditableTrait;
    use CompanyTrait;
    use SoftDeletes;
    use Userstamps;

    protected $connection = 'mysql';

    protected $fillable = [
        'company_id', 'name', 'code', 'rate', 'precision', 'symbol', 'symbol_first', 'decimal_mark',
        'thousands_separator', 'is_active', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();

        self::addGlobalScope(new CompanyScope());
        self::addGlobalScope(new IsActiveScope());
    }
}
