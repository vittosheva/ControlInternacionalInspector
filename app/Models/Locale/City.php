<?php

namespace App\Models\Locale;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class City extends Model implements Auditable
{
    use AuditableTrait;

    protected $connection = 'mysql';

    protected $fillable = [
        'name', 'state_id', 'state_code', 'country_id', 'country_code', 'latitude', 'longitude', 'flag',
        'wiki_data_id', 'is_active',
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
