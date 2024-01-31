<?php

namespace App\Models\Inspections;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Station extends Model implements Auditable
{
    use AuditableTrait;

    protected $connection = 'control_prod';

    protected $table = 'stations';

    protected $fillable = [
        'name', 'code', 'company_id', 'station_type_id', 'region_id', 'octane_super', 'octane_extra', 'flash_point',
        'price_super', 'price_extra', 'price_diesel_1', 'price_diesel_2', 'price_eco_plus',
        'location_id', 'street', 'active', 'octane_eco_plus', 'email_customer',
        'station_manager_name', 'station_manager_signature',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new IsActiveScope());
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function hoses(): HasMany
    {
        return $this->hasMany(Hose::class);
    }
}
