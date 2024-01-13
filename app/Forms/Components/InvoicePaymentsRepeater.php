<?php

namespace App\Forms\Components;

use App\Enums\PeriodsEnum;
use App\Models\Common\PaymentMethod;
use App\Models\Document\Document;
use Awcodes\FilamentTableRepeater\Components\TableRepeater;
use Closure;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InvoicePaymentsRepeater extends TableRepeater
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label('')
            ->schema([
                Select::make('payment_method_id')
                    ->label(__('Payment Method'))
                    ->options(PaymentMethod::query()
                        ->orderByRaw('FIELD(`code`, 01) DESC')
                        ->orderBy('name', 'ASC')
                        ->pluck('name', 'code')
                        ->toArray())
                    ->searchable()
                    ->default('01')
                    ->afterStateUpdated(fn (Component $livewire, Select $component) => $livewire->validateOnly($component->getStatePath()))
                    ->required()
                    ->columnSpan(5),
                PriceTextInput::make('total')
                    ->label(__('Amount2'))
                    ->required()
                    ->columnSpan(2),
                TextInput::make('payment_deadline')
                    ->label(__('Term'))
                    ->default(1)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                    ->required()
                    ->columnSpan(2),
                Select::make('time_unit')
                    ->label(__('Time'))
                    ->options(PeriodsEnum::arrayTranslate())
                    ->default(PeriodsEnum::default())
                    ->afterStateUpdated(fn (Component $livewire, Select $component) => $livewire->validateOnly($component->getStatePath()))
                    ->required()
                    ->columnSpan(2),
            ])
            ->columnWidths([
                'payment_method_id' => '40%',
                'total' => '20%',
                'payment_deadline' => '20%',
                'time_unit' => '20%',
            ])
            ->relationship('invoicePayments')
            ->orderColumn('consecutive')
            ->mutateRelationshipDataBeforeCreateUsing(function (array $data): array {
                $data['document_code'] = DB::table(Document::getModel()->getTable())
                    ->where('system_name', '=', 'invoice')
                    ->orWhere('name', '=', 'invoice')
                    ->where('is_active', '=', 1)
                    ->limit(1)
                    ->value('code');
                $data['document_type_code'] = 2;
                $data['created_by'] = auth()->id();

                return $data;
            })
            ->rules([
                function (Get $get, TableRepeater $component, Component $livewire) {
                    return function (string $attribute, $value, Closure $fail) use ($get, $livewire) {
                        $paymentRepeater = collect($livewire->data['payment_methods'] ?? []);
                        $total = $get('total');
                        $paymentTotals = $paymentRepeater->sum(fn ($value) => ! empty($value['total']) && is_numeric($value['total']) ? $value['total'] : 0);

                        if ($total != $paymentTotals) {
                            $fail(__('The sum of all payments is equal to the total of the invoice.', [
                                'difference' => number_format($total - $paymentTotals, 2, '.', ''),
                            ]));
                        }
                    };
                },
            ])
            ->addActionLabel(__('Add Payment Method'))
            ->emptyLabel(__('No Payment Method Records'))
            ->hideLabels()
            ->addable()
            ->deletable()
            ->cloneable()
            ->afterStateUpdated(fn (Component $livewire, InvoicePaymentsRepeater $component) => $livewire->validateOnly($component->getStatePath()))
            ->minItems(1)
            ->defaultItems(1)
            ->columns(12)
            ->columnSpanFull()
            ->required();
    }
}
