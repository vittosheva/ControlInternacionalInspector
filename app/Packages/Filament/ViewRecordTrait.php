<?php

namespace App\Packages\Filament;

use App\Actions\Filament\ConvertToInvoiceAction;
use App\Actions\Filament\GoBackAction;
use App\Actions\Filament\PrintAction;
use App\Actions\Filament\RegisterCollectionAction;
use App\Actions\Filament\SendEmailAction;
use App\Actions\Filament\SendToSRIAction;
use App\Actions\Filament\ViewPdfAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\EditAction;

trait ViewRecordTrait
{
    protected function getHeaderActions(): array
    {
        return $this->baseHeaderActions();
    }

    protected function baseHeaderActions(): array
    {
        return [
            GoBackAction::make()->url(app(static::$resource)::getUrl()),
            EditAction::make(),
        ];
    }

    protected function documentHeaderActions(): array
    {
        return [
            GoBackAction::make()->url(app(static::$resource)::getUrl()),
            ActionGroup::make([
                ActionGroup::make([
                    ConvertToInvoiceAction::make(),
                ])
                    ->dropdown(false),
                SendEmailAction::make(),
                ActionGroup::make([
                    ViewPdfAction::make(),
                ])
                    ->dropdown(false),
            ])
                ->dropdownPlacement('bottom-start'),
            PrintAction::make(),
            RegisterCollectionAction::make()
                ->hidden(fn ($record) => ! $record->document_code->isInvoice()),
            SendToSRIAction::make()
                ->hidden(fn ($record) => ! $record->document_code->isElectronic()),
            EditAction::make(),
        ];
    }
}
