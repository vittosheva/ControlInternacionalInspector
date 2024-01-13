<?php

namespace App\Models\Core;

use App\Models\Persona\User;
use App\Models\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Wildside\Userstamps\Userstamps;

class Department extends Model implements Auditable
{
    use AuditableTrait;
    use CompanyTrait;
    use HasLocks;
    use SoftDeletes;
    use Userstamps;

    protected $connection = 'mysql';

    protected $fillable = [
        'company_id',
        'manager_id',
        'parent_id',
        'name',
        'description',
        'created_by',
        'updated_by',
    ];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function parent(): BelongsTo
    {
        return $this
            ->belongsTo(self::class, 'parent_id')
            ->whereKeyNot($this->getKey());
    }

    public function subDepartment(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function employeeships(): HasMany
    {
        return $this->hasMany(User::class, 'department_id');
    }
}
