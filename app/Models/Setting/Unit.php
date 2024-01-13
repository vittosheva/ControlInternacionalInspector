<?php

namespace App\Models\Setting;

use App\Models\Scopes\IsActiveScope;
use App\Models\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Wildside\Userstamps\Userstamps;

class Unit extends Model implements Auditable
{
    use AuditableTrait;
    use CompanyTrait;
    use HasLocks;
    use SoftDeletes;
    use Userstamps;

    public static string $prefixName = 'UNI';

    protected $connection = 'mysql';

    protected $fillable = [
        'company_id', 'code', 'name', 'order', 'default', 'is_active', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();

        self::addGlobalScope(new IsActiveScope());
    }
}
