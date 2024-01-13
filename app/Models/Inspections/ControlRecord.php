<?php

namespace App\Models\Inspections;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ControlRecord extends Model
{
    protected $connection = 'control_prod';

    protected $table = 'control_records';

    protected $fillable = [
        'inspection_date', 'year', 'month', 'observations', 'octane_super', 'octane_extra', 'flash_point',
        'water_in_tank_super_1', 'water_in_tank_super_2', 'water_in_tank_extra_1', 'water_in_tank_extra_2',
        'water_in_tank_extra_3', 'water_in_tank_diesel_1', 'water_in_tank_diesel_2',
        'company_id', 'station_id', 'bathrooms_state_id',
        'arch_letter_sent', 'arch_letter_delivered', 'arch_letter_delivered_at', 'arch_letter_sent_at', 'active',
        'price_diesel_1', 'price_diesel_2', 'price_extra', 'price_super', 'octane_eco_plus', 'price_eco_plus',
        'inspector_notes', ' created_by', 'updated_by',
    ];

    protected $casts = [
        'inspection_date' => 'date:Y-m-d',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new IsActiveScope());
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class, 'station_id');
    }

    public function bathroomState(): BelongsTo
    {
        return $this->belongsTo(BathroomState::class, 'bathrooms_state_id');
    }

    public function details(): HasMany
    {
        return $this
            ->hasMany(ControlRecordDetail::class, 'control_record_id')
            ->join('hoses', 'hoses.id', '=', 'control_records_detail.hose_id')
            ->orderBy('hoses.name');
    }

    public function complementaryServices(): HasMany
    {
        return $this
            ->hasMany(ControlRecordService::class, 'control_records_id')
            ->with('complementaryService')
            ->orderBy('complementary_services_id');
    }
}
