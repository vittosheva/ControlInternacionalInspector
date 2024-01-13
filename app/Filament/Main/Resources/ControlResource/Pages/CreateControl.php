<?php

namespace App\Filament\Main\Resources\ControlResource\Pages;

use App\Filament\Main\Resources\ControlResource;
use App\Models\Inspections\ControlRecordDetail;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Colors\Color;
use Filament\Support\Exceptions\Halt;

class CreateControl extends CreateRecord
{
    protected $listeners = [
        'hosesUpdated',
    ];

    public array $dataCollection = [];

    protected static string $resource = ControlResource::class;

    public function hosesUpdated($data): void
    {
        $this->dataCollection = $data;
    }

    /**
     * @throws Halt
     */
    public function afterValidate(): void
    {
        if (empty($this->dataCollection)) {
            Notification::make()
                ->title('No se han realizado inspecciones.')
                ->color(Color::Amber)
                ->warning()
                ->send();
            $this->halt();
        }

        if ($this->dataCollection['total'] != count($this->dataCollection['inspections_done'])) {
            Notification::make()
                ->title('Faltan inspecciones')
                ->body('Actualmente tiene '.count($this->dataCollection['inspections_done']).'/'.$this->dataCollection['total'])
                ->color(Color::Amber)
                ->warning()
                ->send();
            $this->halt();
        }
    }

    public function afterCreate(): void
    {
        $savedRecord = $this->getRecord();

        $controlRecordDetails = collect($this->dataCollection['inspections_done'])
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

        ControlRecordDetail::query()->insert($controlRecordDetails);
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
