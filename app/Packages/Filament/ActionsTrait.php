<?php

namespace App\Packages\Filament;

use App\Actions\Filament\ConvertToInvoiceAction;
use App\Actions\Filament\GeneratePdfAction;
use App\Actions\Filament\SendEmailAction;
use App\Actions\Filament\SendTelegramBotInvitationAction;
use App\Actions\Filament\SendTelegramMessageAction;
use App\Actions\Filament\SendWhatsAppMessageAction;
use App\Actions\Filament\ViewPdfAction;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ViewAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

trait ActionsTrait
{
    public static function baseActions()
    {
        return ActionGroup::make([
            ActionGroup::make([
                EditAction::make(),
                ViewAction::make()->label(__('Details')),
            ])
                ->dropdown(false),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ]);
    }

    public static function saleActions()
    {
        return ActionGroup::make([
            ActionGroup::make([
                EditAction::make(),
                ViewAction::make()->label(__('Details')),
            ])
                ->dropdown(false),
            ActionGroup::make([
                SendTelegramBotInvitationAction::make(),
            ])
                ->dropdown(false),
            /*ActionGroup::make([
                    Action::make('proforma')
                        ->label(__('Create Proforma'))
                        ->icon('heroicon-m-document-text')
                        ->url(fn ($record): string => route('filament.sales.resources.proformas.create', ['tenant' => filament()->getTenant(), 'persona_id' => $record->id]))
                        ->openUrlInNewTab(),
                    Action::make('sale_note')
                        ->label(__('Create Sale Note'))
                        ->icon('heroicon-m-document-text')
                        ->url(fn ($record): string => route('filament.sales.resources.sale-notes.create', ['tenant' => filament()->getTenant(), 'persona_id' => $record->id]))
                        ->openUrlInNewTab(),
                    Action::make('invoice')
                        ->label(__('Create Invoice'))
                        ->icon('heroicon-m-document-text')
                        ->url(fn ($record): string => route('filament.sales.resources.invoices.create', ['tenant' => filament()->getTenant(), 'persona_id' => $record->id]))
                        ->openUrlInNewTab(),
                    Action::make('purchase_settlement')
                        ->label(__('Create Purchase Settlement'))
                        ->icon('heroicon-m-document-text')
                        ->url(fn ($record): string => route('filament.sales.resources.purchase-settlements.create', ['tenant' => filament()->getTenant(), 'persona_id' => $record->id]))
                        ->openUrlInNewTab(),
                    Action::make('credit_note')
                        ->label(__('Create Credit Note'))
                        ->icon('heroicon-m-document-text')
                        ->url(fn ($record): string => route('filament.sales.resources.credit-notes.create', ['tenant' => filament()->getTenant(), 'persona_id' => $record->id]))
                        ->openUrlInNewTab(),
                    Action::make('debit_note')
                        ->label(__('Create Debit Note'))
                        ->icon('heroicon-m-document-text')
                        ->url(fn ($record): string => route('filament.sales.resources.debit-notes.create', ['tenant' => filament()->getTenant(), 'persona_id' => $record->id]))
                        ->openUrlInNewTab(),
                    Action::make('waybill')
                        ->label(__('Create Waybill'))
                        ->icon('heroicon-m-document-text')
                        ->url(fn ($record): string => route('filament.inventory.resources.waybills.create', ['tenant' => filament()->getTenant(), 'persona_id' => $record->id]))
                        ->openUrlInNewTab(),
                ])
                ->dropdown(false),*/
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ]);
    }

    public static function purchaseActions()
    {
        return ActionGroup::make([
            ActionGroup::make([
                EditAction::make(),
                ViewAction::make()->label(__('Details')),
            ])
                ->dropdown(false),
            ActionGroup::make([
                Action::make('bill')
                    ->label(__('Create Bill'))
                    ->icon('heroicon-m-document-text')
                    ->url(fn ($record): string => route('filament.purchases.resources.bills.create', ['tenant' => filament()->getTenant(), 'persona_id' => $record->id]))
                    ->openUrlInNewTab(),
                Action::make('withholding_voucher')
                    ->label(__('Create Withholding Voucher'))
                    ->icon('heroicon-m-document-text')
                    ->url(fn ($record): string => route('filament.purchases.resources.withholding-vouchers.create', ['tenant' => filament()->getTenant(), 'persona_id' => $record->id]))
                    ->openUrlInNewTab(),
            ])
                ->dropdown(false),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ]);
    }

    public static function baseCheckingDeleteActions()
    {
        return ActionGroup::make([
            ActionGroup::make([
                EditAction::make(),
                ViewAction::make()->label(__('Details')),
            ])
                ->dropdown(false),
            DeleteAction::make()
                ->before(function (DeleteAction $action, $record) {
                    if ($record->proformas()->exists()) {
                        Notification::make()
                            ->title(__('Data is in use'))
                            ->body(__('Data is in use by another source'))
                            ->danger()
                            ->color(Color::Red)
                            ->send();
                        $action->cancel();
                    }
                })
                ->after(function (Model $record) {
                    if (! empty($record->media) && $record->media instanceof MediaCollection) {
                        $record->media->each(function ($media) {
                            Storage::disk($media->disk)->delete($media->id.'/'.$media->file_name);
                            $media->delete();
                        });
                    }
                }),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ]);
    }

    public static function documentActions()
    {
        return ActionGroup::make([
            ActionGroup::make([
                EditAction::make(),
                ViewAction::make()->label(__('Details')),
            ])
                ->dropdown(false),
            ActionGroup::make([
                ConvertToInvoiceAction::make(),
            ])
                ->dropdown(false),
            SendEmailAction::make(),
            SendWhatsAppMessageAction::make(),
            SendTelegramMessageAction::make(),
            ActionGroup::make([
                GeneratePdfAction::make(),
                ViewPdfAction::make(),
            ])
                ->dropdown(false),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ]);
    }

    public static function documentIssuedActions()
    {
        return ActionGroup::make([
            ActionGroup::make([
                ViewAction::make()->label(__('Details')),
            ])
                ->dropdown(false),
            SendEmailAction::make(),
            SendWhatsAppMessageAction::make(),
            SendTelegramMessageAction::make(),
            ActionGroup::make([
                ViewPdfAction::make(),
            ])
                ->dropdown(false),
        ]);
    }

    public static function documentReceivedActions()
    {
        return ActionGroup::make([
            ActionGroup::make([
                ViewAction::make()->label(__('Details')),
            ])
                ->dropdown(false),
            ActionGroup::make([
                ViewPdfAction::make(),
            ])
                ->dropdown(false),
        ]);
    }
}
