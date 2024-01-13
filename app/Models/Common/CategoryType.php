<?php

namespace App\Models\Common;

use App\Models\Scopes\IsActiveScope;
use App\Models\Traits\CategoryTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class CategoryType extends Model implements Auditable
{
    use AuditableTrait;
    use CategoryTrait;
    use SoftDeletes;

    protected $connection = 'mysql';

    protected $fillable = [
        'name', 'system_name', 'color', 'is_active',
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
