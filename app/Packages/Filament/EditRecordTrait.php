<?php

namespace App\Packages\Filament;

use App\Actions\Filament\ConvertToInvoiceAction;
use App\Actions\Filament\CreateNewAction;
use App\Actions\Filament\GeneratePdfAction;
use App\Actions\Filament\GoBackAction;
use App\Actions\Filament\PrintAction;
use App\Actions\Filament\RegisterCollectionAction;
use App\Actions\Filament\SendEmailAction;
use App\Actions\Filament\SendToSRIAction;
use App\Actions\Filament\ViewPdfAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Model;

trait EditRecordTrait
{
    public function mount(int|string $record): void
    {
        parent::mount($record);

        $this->previousUrl = app(static::$resource)->getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return $this->baseHeaderActions();
    }

    protected function getSavedNotification(): ?Notification
    {
        $title = $this->getSavedNotificationTitle();

        if (blank($title)) {
            return null;
        }

        return Notification::make()
            ->success()
            ->color(Color::Green)
            ->title($this->getSavedNotificationTitle());
    }

    protected function baseHeaderActions(): array
    {
        return [
            GoBackAction::make()->url(app(static::$resource)::getUrl()),
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
            CreateNewAction::make()->url(app(static::$resource)::getUrl('create')),
        ];
    }

    protected function documentHeaderActions(): array
    {
        return [
            GoBackAction::make()->url(app(static::$resource)::getUrl()),
            ActionGroup::make([
                ActionGroup::make([
                    ViewAction::make(),
                ])
                    ->dropdown(false),
                ActionGroup::make([
                    ConvertToInvoiceAction::make(),
                ])
                    ->dropdown(false),
                SendEmailAction::make(),
                ActionGroup::make([
                    GeneratePdfAction::make(),
                    ViewPdfAction::make(),
                ])
                    ->dropdown(false),
            ])
                ->dropdownPlacement('top-start'),
            PrintAction::make(),
            RegisterCollectionAction::make()
                ->hidden(fn ($record) => ! $record->document_code->isInvoice()),
            SendToSRIAction::make()
                ->tooltip(function ($record) {
                    $record = $record->load('invoiceXml:id,invoice_id,source_type_code,environment,attempts');

                    if (! empty($record->invoiceXml->attempts)) {
                        return __('Attempts Number', ['attempts' => $record->invoiceXml->attempts]);
                    }

                    return null;
                })
                ->hidden(fn ($record) => $record->document_code->isNotElectronic() || ! empty($record->sri_authorization_number)),
            ViewAction::make(),
            DeleteAction::make()
                ->hidden(fn (Model $record) => ! empty($record->sri_status)),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
