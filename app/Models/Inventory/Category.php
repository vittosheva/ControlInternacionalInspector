<?php

namespace App\Models\Inventory;

use App\Models\Scopes\CompanyScope;
use App\Models\Scopes\IsActiveScope;
use App\Models\Traits\CategoryTrait;
use App\Models\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Wildside\Userstamps\Userstamps;

class Category extends Model implements Auditable
{
    use AuditableTrait;
    use CategoryTrait;
    use CompanyTrait;
    use HasLocks;
    use SoftDeletes;
    use Userstamps;

    protected $connection = 'mysql';

    protected $fillable = [
        'company_id', 'category_type_id', 'parent_id', 'name', 'description', 'color', 'is_active', 'created_by',
        'updated_by', 'deleted_by',
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
