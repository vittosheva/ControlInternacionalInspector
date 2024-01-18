<?php

namespace App\Models\Inspections;

use App\Models\Persona\User;
use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'inspector_notes', 'serafin_code', 'allowed_to_place_calibration_seals', 'created_by', 'updated_by',
        'inspection_report_pdf',
    ];

    protected $casts = [
        'inspection_date' => 'date:Y-m-d',
        'allowed_to_place_calibration_seals' => 'boolean',
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

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
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

    public function environmentalObservations(): HasMany
    {
        return $this
            ->hasMany(ControlRecordEnvironmental::class, 'control_records_id')
            ->with('environmentalObservation')
            ->orderBy('environmental_observations_id');
    }

    public function bathroomComplianceObservations(): HasMany
    {
        return $this
            ->hasMany(ControlRecordBathroom::class, 'control_records_id')
            ->with('bathroomComplianceObservation')
            ->orderBy('bathroom_compliance_observations_id');
    }

    public function complementaryService(): BelongsToMany
    {
        return $this->belongsToMany(ComplementaryService::class, ControlRecordService::class, 'complementary_services_id', 'id', 'id');
    }

    public function environmentalObservationsMany(): BelongsToMany
    {
        return $this->belongsToMany(EnvironmentalObservation::class, ControlRecordEnvironmental::class, 'environmental_observations_id', 'id', 'id');
    }

    public function bathroomComplianceObservationsMany(): BelongsToMany
    {
        return $this->belongsToMany(BathroomComplianceObservation::class, ControlRecordBathroom::class, 'bathroom_compliance_observations_id', 'id', 'id');
    }
}
