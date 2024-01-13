<?php

namespace App\Models\Inventory;

use App\Models\Scopes\CompanyScope;
use App\Models\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Tags\HasTags;
use Spatie\Tags\Tag as SpatieTag;
use Wildside\Userstamps\Userstamps;

class Tag extends SpatieTag implements Auditable
{
    use AuditableTrait;
    use CompanyTrait;
    use HasLocks;
    use HasTags;
    use SoftDeletes;
    use Userstamps;

    protected $connection = 'mysql';

    protected $fillable = [
        'company_id', 'name', 'slug', 'type', 'order_column', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected static function boot(): void
    {
        parent::boot();

        self::addGlobalScope(new CompanyScope());
    }
}
