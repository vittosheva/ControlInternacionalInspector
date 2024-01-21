<?php

namespace App\Models\Inspections;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Hose extends Model implements Auditable
{
    use AuditableTrait;

    protected $connection = 'control_prod';

    protected $table = 'hoses';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['type'];

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new IsActiveScope());
    }

    public function type(): HasOne
    {
        return $this->hasOne(HoseType::class, 'id', 'hose_type_id');
    }

    public function controlDetails(): HasManyThrough
    {
        return $this->hasManyThrough(ControlRecordDetail::class, ControlRecord::class, 'id', 'control_record_id', 'hose_type_id', 'id');
    }
}
