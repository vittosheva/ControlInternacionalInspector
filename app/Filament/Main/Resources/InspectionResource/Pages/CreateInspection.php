<?php

namespace App\Filament\Main\Resources\InspectionResource\Pages;

use App\Filament\Main\Resources\InspectionResource;
use App\Models\Inspections\ComplementaryService;
use App\Models\Inspections\EnvironmentalObservation;
use App\Traits\InspectionTrait;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\IconSize;

class CreateInspection extends CreateRecord
{
    use InspectionTrait;

    protected static string $resource = InspectionResource::class;

    protected $listeners = [
        'hosesUpdated',
        'complementaryServicesUpdated',
    ];

    public function mount(): void
    {
        parent::mount();

        $this->data['complementary_services'] = ComplementaryService::query()->pluck('id')->toArray();
        $this->data['environmental_observations'] = EnvironmentalObservation::query()->pluck('id')->toArray();
    }

    public function afterCreate(): void
    {
        $this->saveInDatabase();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('create-new')
                ->label(__('Empezar de nuevo'))
                ->icon('lucide-refresh-cw')
                ->iconSize(IconSize::Small)
                ->action(function () {
                    return redirect(InspectionResource::getUrl('create'));
                })
                ->requiresConfirmation(),
        ];
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('filament-panels::resources/pages/create-record.form.actions.cancel.label'))
            ->url(InspectionResource::getUrl())
            ->color('gray');
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
