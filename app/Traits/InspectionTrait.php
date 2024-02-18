<?php

namespace App\Traits;

use App\Models\Inspections\ControlRecord;
use App\Models\Inspections\ControlRecordBathroom;
use App\Models\Inspections\ControlRecordDetail;
use App\Models\Inspections\ControlRecordEnvironmental;
use App\Models\Inspections\ControlRecordService;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\DB;
use Throwable;

trait InspectionTrait
{
    public array $dataHoses = [];

    public array $dataComplementaryServices = [];

    public function hosesUpdated($data): void
    {
        $this->dataHoses = $data;

        if ($this->dataHoses['total'] == count($this->dataHoses['inspections_done'])) {
            $this->data['hose_inspections_completed'] = true;
        }
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
        if (auth()->user()->isAdmin()) {
            return;
        }

        /*if (empty($this->data['do_not_update']) || $this->data['do_not_update']) {
            $this->halt();
        }*/

        if (
            empty($this->dataHoses)
            || empty($this->dataHoses['total'])
            || empty($this->dataHoses['inspections_done'])
        ) {
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

    /**
     * @throws Throwable
     */
    protected function saveInDatabase(): void
    {
        $savedRecord = $this->getRecord();

        if (! $savedRecord instanceof ControlRecord) {
            return;
        }

        DB::transaction(function () use ($savedRecord) {
            // 1. Control Details
            if (! empty($this->dataHoses['inspections_done'])) {
                $controlRecordDetails = collect($this->dataHoses['inspections_done'])
                    ->map(function ($item) use ($savedRecord) {
                        unset(
                            $item['hose'],
                            $item['fuel'],
                            $item['product'],
                            $item['color'],
                        );

                        $item['control_record_id'] = $savedRecord->id ?? null;

                        return (new ControlRecordDetail())->fill($item);
                    })
                    ->values();

                if ($controlRecordDetails->isNotEmpty()) {
                    $savedRecord->controlDetails()->delete();
                    $savedRecord->controlDetails()->saveMany($controlRecordDetails->all());
                }
            }

            // 2. Control Complementary Services
            if (! empty($this->dataComplementaryServices['complementary_services'])) {
                $controlRecordServices = collect($this->dataComplementaryServices['complementary_services'])
                    ->map(function ($item) use ($savedRecord) {
                        return (new ControlRecordService())->fill([
                            'control_records_id' => $savedRecord->id,
                            'complementary_services_id' => $item,
                            'complete' => 1,
                        ]);
                    })
                    ->values();

                if ($controlRecordServices->isNotEmpty()) {
                    $savedRecord->complementaryServices()->delete();
                    $savedRecord->complementaryServices()->saveMany($controlRecordServices->all());
                }
            }

            // 3. Control Environmental Observations
            if (! empty($this->dataComplementaryServices['environmental_observations'])) {
                $controlRecordEnvironmentals = collect($this->dataComplementaryServices['environmental_observations'])
                    ->map(function ($item) use ($savedRecord) {
                        return (new ControlRecordEnvironmental())->fill([
                            'control_records_id' => $savedRecord->id,
                            'environmental_observations_id' => $item,
                            'complete' => 1,
                        ]);
                    })
                    ->values();

                if ($controlRecordEnvironmentals->isNotEmpty()) {
                    $savedRecord->environmentalObservations()->delete();
                    $savedRecord->environmentalObservations()->saveMany($controlRecordEnvironmentals->all());
                }
            }

            // 4. Control Bathroom Compliance Observations
            if (! empty($this->dataComplementaryServices['bathroom_compliance_observations'])) {
                $controlRecordBathrooms = collect($this->dataComplementaryServices['bathroom_compliance_observations'])
                    ->map(function ($items, $key) use ($savedRecord) {
                        $bathroomComplianceObservations = [];

                        if (! empty($items) && is_array($items)) {
                            foreach ($items as $sex => $item) {
                                $bathroomComplianceObservations['control_records_id'] = $savedRecord->id;
                                $bathroomComplianceObservations['bathroom_compliance_observations_id'] = $key;

                                if ($sex == 'men') {
                                    $bathroomComplianceObservations['men'] = (bool) $item;
                                } elseif ($sex == 'women') {
                                    $bathroomComplianceObservations['women'] = (bool) $item;
                                } elseif ($sex == 'disability_person') {
                                    $bathroomComplianceObservations['disability_person'] = (bool) $item;
                                }
                            }
                        }

                        return (new ControlRecordBathroom())->fill($bathroomComplianceObservations);
                    })
                    ->values();

                if ($controlRecordBathrooms->isNotEmpty()) {
                    $savedRecord->bathroomComplianceObservations()->delete();
                    $savedRecord->bathroomComplianceObservations()->saveMany($controlRecordBathrooms);
                }
            }

            $savedRecord->admin_authorization = 0;
            $savedRecord->save();
        });
    }
}
