<?php

namespace App\Forms\Components;

use App\Models\Persona\Customer;
use App\Models\Scopes\WithoutFinalConsumerScope;
use Closure;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Livewire\Component;

class FinalConsumerToggle extends Toggle
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Final Consumer'))
            ->inline(false)
            ->dehydrated(false)
            ->rules([
                fn (Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                    $sriRuleForFinalConsumer = config('dorsi.invoice_max_total_allow_to_final_consumer');
                    if ($value && $get('total') >= $sriRuleForFinalConsumer) {
                        Notification::make()
                            ->title(__('Error'))
                            ->body(__('You cannot invoice the final consumer if the total is greater than or equal to', ['amount' => $sriRuleForFinalConsumer]))
                            ->color(Color::Red)
                            ->danger()
                            ->send();
                        $fail(__('Error check'));
                    }
                },
            ])
            ->default(0)
            ->afterStateUpdated(function ($state, Get $get, Set $set, Component $livewire, Toggle $component) {
                $set('persona_id', null);

                if (! $state) {
                    return;
                }

                $persona = Customer::withoutGlobalScope(new WithoutFinalConsumerScope())
                    ->updateOrCreate([
                        'identification_type' => '07',
                        'identification_number' => finalConsumerNumber(),
                    ], [
                        'persona_type' => null,
                        'business_name' => 'Consumidor Final',
                        'trade_name' => 'Consumidor Final',
                        'email' => 'consumidorfinal@consumidorfinal.com',
                        'password' => bcrypt('consumidorfinal@consumidorfinal.com'),
                        'emails_to_send_invoices' => ['consumidorfinal@consumidorfinal.com'],
                        'telephone' => 'N/A',
                        'address' => 'N/A',
                        'is_allowed_to_login' => 0,
                        'is_active' => 1,
                    ]);

                $set('persona_model', $persona::class);
                $set('persona_id', $persona->getAttributeValue('id'));
                $set('persona_identification_number', $persona->getAttributeValue('identification_number'));
                $set('persona_business_name', $persona->getAttributeValue('business_name'));
                $set('persona_email', $persona->getAttributeValue('email'));
                $set('persona_address', $persona->getAttributeValue('address'));

                $livewire->validateOnly($component->getStatePath());
            })
            ->afterStateHydrated(function ($state, $record, Get $get, Set $set, Toggle $component) {
                if (
                    ! empty($get('persona_id')) &&
                    ! empty($record->persona_identification_number) &&
                    $record->persona_identification_number === finalConsumerNumber()
                ) {
                    $set($component->statePath, 1);
                } else {
                    $set($component->statePath, 0);
                }
            });
    }
}
