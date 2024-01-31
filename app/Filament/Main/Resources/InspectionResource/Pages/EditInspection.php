<?php

namespace App\Filament\Main\Resources\InspectionResource\Pages;

use App\Actions\Filament\GeneratePdfAction;
use App\Actions\Filament\ViewPdfAction;
use App\Filament\Main\Resources\InspectionResource;
use App\Models\Inspections\ControlRecordBathroom;
use App\Models\Persona\User;
use App\Traits\InspectionTrait;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Model;

class EditInspection extends EditRecord
{
    use InspectionTrait;

    protected static string $resource = InspectionResource::class;

    protected $listeners = [
        'hosesUpdated',
        'complementaryServicesUpdated',
    ];

    public function getRecord(): Model
    {
        return $this->record
            ->load([
                'station:id,name',
                'bathroomComplianceObservations',
            ]);
    }

    public function afterSave(): void
    {
        $this->saveInDatabase();
    }

    protected function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                ActionGroup::make([
                    Action::make(__('Autorizar reingreso'))
                        ->icon('lucide-fingerprint')
                        ->form([
                            Fieldset::make(__('Reingreso'))
                                ->schema([
                                    Select::make('created_by')
                                        ->label(__('Autorizar a'))
                                        ->options(User::query()
                                            ->role('Inspector')
                                            ->orderBy('name')
                                            ->pluck('name', 'id')
                                            ->toArray())
                                        ->default(fn ($record) => $record->created_by),
                                    Radio::make('admin_authorization')
                                        ->label('Autorización')
                                        ->options([
                                            1 => __('Yes'),
                                            0 => __('No'),
                                        ])
                                        ->inline()
                                        ->required(),
                                ])
                                ->columns(1),
                        ])
                        ->action(function ($record, $data) {
                            $record->created_by = $data['created_by'];
                            $record->admin_authorization = $data['admin_authorization'];
                            $record->save();

                            Notification::make()
                                ->title('Registro actualizado')
                                ->success()
                                ->color(Color::Emerald)
                                ->send();
                        })
                        ->requiresConfirmation(),
                ])
                    ->dropdown(false),
                GeneratePdfAction::make(),
                ViewPdfAction::make(),
            ]),
            DeleteAction::make(),
        ];
    }

    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->disabled(function ($record): bool {
                if (auth()->user()->isAdmin()) {
                    return false;
                }

                if ($record->admin_authorization && ! empty($this->data['hose_inspections_completed'])) {
                    return ! $this->data['hose_inspections_completed'];
                }

                return ! empty($this->data['do_not_update']) && ! $this->data['do_not_update'];
            });
    }

    protected function authorizeAccess(): void
    {
        abort_unless(
            InspectionResource::canEdit($this->getRecord())
            || ($this->getRecord()->created_by === auth()->id() && $this->getRecord()->admin_authorization), 403);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['bathroom_compliance_observations'] = ControlRecordBathroom::query()
            ->select([
                'bathroom_compliance_observations_id',
                'men',
                'women',
                'disability_person',
            ])
            ->where('control_records_id', '=', $data['id'])
            ->get()
            ->mapWithKeys(function ($item) {
                return [
                    $item->bathroom_compliance_observations_id => [
                        'men' => (bool) $item->men,
                        'women' => (bool) $item->women,
                        'disability_person' => (bool) $item->disability_person,
                    ],
                ];
            })
            ->toArray();

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        unset($data['do_not_update']);

        return $data;
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('filament-panels::resources/pages/create-record.form.actions.cancel.label'))
            ->url(InspectionResource::getUrl())
            ->color('gray');
    }

    protected function getRedirectUrl(): ?string
    {
        if (auth()->user()->isAdmin()) {
            return null;
        }

        return InspectionResource::getUrl();
    }
}
