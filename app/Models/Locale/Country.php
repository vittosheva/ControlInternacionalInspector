<?php

namespace App\Models\Locale;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Country extends Model implements Auditable
{
    use AuditableTrait;

    protected $connection = 'mysql';

    protected $fillable = [
        'name', 'iso3', 'numeric_code', 'iso2', 'phonecode', 'capital', 'currency', 'currency_symbol', 'tld', 'native',
        'region', 'subregion', 'timezones', 'translations', 'latitude', 'longitude', 'emoji', 'emoji_u', 'flag',
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
