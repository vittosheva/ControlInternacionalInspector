<?php

namespace App\Actions\Filament;

use App\Enums\DocumentEnum;
use App\Enums\InvoiceStatusEnum;
use App\Enums\PeriodsEnum;
use App\Filament\Sales\Resources\InvoiceResource;
use App\Forms\Components\EmissionPointSelect;
use App\Forms\Components\EstablishmentSelect;
use App\Forms\Components\IssueDateFlatpickr;
use App\Forms\Components\SequentialTextInput;
use App\Models\Document\Invoice;
use App\Models\Document\InvoicePayment;
use App\Models\Setting\Sequential;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action as TableAction;
use Illuminate\Database\Eloquent\Model;

class ConvertToInvoiceAction extends TableAction
{
    public static function getDefaultName(): ?string
    {
        return 'convertToInvoice';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(function ($record) {
                if (
                    ! empty($record->reference_invoiced_date)
                    //&& $record->reference_document_code === DocumentEnum::INVOICE
                ) {
                    return __('Converted To Invoice');
                }

                return __('Convert To Invoice');
            })
            ->icon('heroicon-s-arrow-path')
            ->outlined(false)
            ->color(Color::Slate)
            ->disabled(function ($record) {
                if (
                    ! empty($record->reference_invoiced_date)
                    //&& $record->reference_document_code === DocumentEnum::INVOICE
                ) {
                    return true;
                }

                return false;
            })
            ->requiresConfirmation()
            ->form([
                Grid::make()
                    ->schema([
                        IssueDateFlatpickr::make('issue_date')
                            ->default(now()->format('Y-m-d'))
                            ->required(),
                        EstablishmentSelect::make('establishment'),
                        EmissionPointSelect::make('emission_point'),
                        SequentialTextInput::make('visual_sequential'),
                        Hidden::make('document_code')->default(DocumentEnum::INVOICE->value),
                        Hidden::make('sequential'),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ])
            ->action(function (array $data, $record): void {
                $record = $record->load('invoiceItems');

                $invoice = $this->createInvoice($data, $record);
                $invoice = $invoice->refresh();

                $this->createInvoiceItems($record, $invoice);

                $referenceInvoiceId = $this->updateInvoiceReferentialDocument($record, $invoice);

                $notification = Notification::make()
                    ->title('Proforma convertida a factura')
                    ->body('La proforma '.idNumberFormat($record->invoice_id, DocumentEnum::PROFORMA->prefix(), addSymbol: '-').' fue correctamente convertida a factura de ventas '.idNumberFormat($invoice->getAttributeValue('invoice_id'), DocumentEnum::INVOICE->prefix(), addSymbol: '-'))
                    ->color(Color::Green)
                    ->success()
                    ->actions([
                        Action::make('view_document')
                            ->label(__('View Document'))
                            ->color(Color::Green)
                            ->button()
                            ->url(InvoiceResource::getUrl('edit', ['record' => $referenceInvoiceId]), shouldOpenInNewTab: true),
                    ]);

                $notification
                    ->persistent()
                    ->send();

                $notification->sendToDatabase(auth()->user());
            })
            ->after(fn (array $data) => Sequential::incrementValue($data['document_code'], $data['establishment'], $data['emission_point']))
            ->visible(fn ($record) => ! empty($record->document_code) && $record->document_code->is([
                DocumentEnum::PROFORMA,
                DocumentEnum::SALE_NOTE,
            ]));
    }

    protected function createInvoice($data, $record): Model
    {
        return Invoice::create([
            ...$record->toArray(),
            'invoice_id' => null,
            'category_id' => null,
            'issue_date' => $data['issue_date'],
            'valid_until' => null,

            'establishment' => $data['establishment'],
            'emission_point' => $data['emission_point'],
            'sequential' => $data['sequential'],

            'xml' => null,
            'pdf' => null,
            'qrcode' => null,
            'send_date_by_email' => null,
            'reference_code' => null,

            'parent_invoice_id' => $record->invoice_id,
            'parent_document_code' => $record->document_code,
            'parent_document_type_code' => $record->document_type_code,
            'parent_document_number' => $record->document_number,
            'parent_invoiced_date' => $record->issue_date,

            'salesperson_id' => $record->salesperson_id ?? $record->created_by,
            'status' => InvoiceStatusEnum::CREATED,

            'created_by' => auth()->id(),
        ]);
    }

    protected function createInvoiceItems($record, $invoice): void
    {
        if (empty($record->invoiceItems)) {
            return;
        }

        foreach ($record->invoiceItems as $invoiceItem) {
            $invoiceItemReplicate = $invoiceItem->replicate();

            $invoiceItemReplicate->invoice_id = $invoice->id;
            $invoiceItemReplicate->document_code = $invoice->document_code;
            $invoiceItemReplicate->document_type_code = $invoice->document_type_code;
            $invoiceItemReplicate->status = $invoice->status;

            $invoiceItemReplicate->save();
        }

        $this->createInvoicePayment($invoice);
    }

    protected function createInvoicePayment($invoice): void
    {
        InvoicePayment::create([
            'invoice_id' => $invoice->id,
            'document_code' => $invoice->document_code,
            'document_type_code' => $invoice->document_type_code,
            'document_number' => $invoice->document_number,
            'consecutive' => 1,
            'payment_method_id' => '01',
            'total' => $invoice->total,
            'payment_deadline' => 1,
            'time_unit' => PeriodsEnum::DAY,
            'status' => $invoice->status,
        ]);
    }

    protected function updateInvoiceReferentialDocument($record, $invoice)
    {
        $record->reference_invoice_id = $invoice->id;
        $record->reference_document_code = $invoice->document_code;
        $record->reference_document_type_code = $invoice->document_type_code;
        $record->reference_document_number = $invoice->document_number;
        $record->reference_invoiced_date = now();
        $record->save();

        return $record->reference_invoice_id;
    }
}
