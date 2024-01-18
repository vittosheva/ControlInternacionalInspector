<?php

namespace App\Filament\Main\Resources\InspectionResource\Pages;

use App\Filament\Main\Resources\InspectionResource;
use App\Models\Inspections\ControlRecordBathroom;
use App\Models\Inspections\ControlRecordDetail;
use App\Models\Inspections\ControlRecordEnvironmental;
use App\Models\Inspections\ControlRecordService;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Colors\Color;
use Filament\Support\Exceptions\Halt;

class CreateInspection extends CreateRecord
{
    protected static string $resource = InspectionResource::class;

    public array $dataHoses = [];

    public array $dataComplementaryServices = [];

    protected $listeners = [
        'hosesUpdated',
        'complementaryServicesUpdated',
    ];

    public function hosesUpdated($data): void
    {
        $this->dataHoses = $data;
    }

    public function complementaryServicesUpdated($data): void
    {
        $this->dataComplementaryServices = $data;
    }

    /**
     * @throws Halt
     */
    public function afterValidate(): void
    {
        if (empty($this->dataHoses)) {
            Notification::make()
                ->title('No se han realizado inspecciones.')
                ->color(Color::Amber)
                ->warning()
                ->send();
            $this->halt();
        }

        if ($this->dataHoses['total'] != count($this->dataHoses['inspections_done'])) {
            Notification::make()
                ->title('Faltan inspecciones')
                ->body('Actualmente tiene '.count($this->dataHoses['inspections_done']).'/'.$this->dataHoses['total'])
                ->color(Color::Amber)
                ->warning()
                ->send();
            $this->halt();
        }
    }

    public function afterCreate(): void
    {
        $savedRecord = $this->getRecord();

        // 1. Control Details
        $controlRecordDetails = collect($this->dataHoses['inspections_done'])
            ->map(function ($item) use ($savedRecord) {
                unset(
                    $item['hose'],
                    $item['fuel'],
                    $item['product'],
                    $item['color'],
                    $item['octane'], // Take care
                );

                $item['control_record_id'] = $savedRecord->id ?? null;
                $item['created_at'] = now();

                return $item;
            })
            ->values()
            ->toArray();

        if (! empty($controlRecordDetails)) {
            ControlRecordDetail::query()->insert($controlRecordDetails);
        }

        // 2. Control Complementary Services
        $complementaryService = [];
        $controlRecordServices = collect($this->dataComplementaryServices['complementary_services'])
            ->map(function ($item) use ($savedRecord, &$complementaryService) {
                $complementaryService['control_records_id'] = $savedRecord->id ?? null;
                $complementaryService['complementary_services_id'] = $item;
                $complementaryService['complete'] = 1;
                $complementaryService['created_at'] = now();

                return $complementaryService;
            })
            ->values()
            ->toArray();

        if (! empty($controlRecordServices)) {
            ControlRecordService::query()->insert($controlRecordServices);
        }

        // 3. Control Environmental Observations
        $environmentalObservation = [];
        $controlRecordEnvironmentals = collect($this->dataComplementaryServices['environmental_observations'])
            ->map(function ($item) use ($savedRecord, &$environmentalObservation) {
                $environmentalObservation['control_records_id'] = $savedRecord->id ?? null;
                $environmentalObservation['environmental_observations_id'] = $item;
                $environmentalObservation['complete'] = 1;
                $environmentalObservation['created_at'] = now();

                return $environmentalObservation;
            })
            ->values()
            ->toArray();

        if (! empty($controlRecordEnvironmentals)) {
            ControlRecordEnvironmental::query()->insert($controlRecordEnvironmentals);
        }

        // 4. Control Bathroom Compliance Observations
        $bathroomComplianceObservations = [];
        $controlRecordBathrooms = collect($this->dataComplementaryServices['bathroom_compliance_observations'])
            ->map(function ($items, $key) use (&$bathroomComplianceObservations) {
                if (! empty($items) && is_array($items)) {
                    foreach ($items as $sex => $item) {
                        $bathroomComplianceObservations['control_records_id'] = null;
                        $bathroomComplianceObservations['bathroom_compliance_observations_id'] = $key;
                        $bathroomComplianceObservations['created_at'] = now();

                        if ($sex == 0) {
                            $bathroomComplianceObservations['men'] = $item;
                        } elseif ($sex == 1) {
                            $bathroomComplianceObservations['women'] = $item;
                        } elseif ($sex == 2) {
                            $bathroomComplianceObservations['disability_person'] = $item;
                        }
                    }
                }

                return $bathroomComplianceObservations;
            })
            ->values()
            ->toArray();

        if (! empty($controlRecordBathrooms)) {
            ControlRecordBathroom::query()->insert($controlRecordBathrooms);
        }
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $date = now();

        return array_merge($data, [
            'inspection_date' => $date,
            'year' => $date->format('Y'),
            'month' => $date->format('n'),
            'bathrooms_state_id' => 1,
            'created_by' => auth()->id(),
        ]);
    }
}
