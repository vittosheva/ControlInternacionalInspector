<?php

namespace App\Models\Common;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class IdentificationType extends Model implements Auditable
{
    use AuditableTrait;

    protected $connection = 'mysql';

    protected $fillable = [
        'code', 'name', 'sri_code', 'is_active',
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
