<?php

namespace App\Forms\Components;

use App\Filament\Sales\Resources\CustomerResource;
use App\Models\Persona\Customer;
use App\Models\Scopes\WithoutFinalConsumerScope;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CustomerSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Customer'))
            ->relationship('customer', 'business_name', fn (Builder $query) => $query
                ->select([
                    ...Customer::getModel()->getFillable(),
                    'id',
                ])
                ->withoutGlobalScope(new WithoutFinalConsumerScope)
            )
            ->afterStateUpdated(function ($state, Component $livewire, Select $component, Set $set) {
                $customer = Customer::query()
                    ->withoutGlobalScope(new WithoutFinalConsumerScope)
                    ->select(['id', 'identification_number', 'business_name', 'email', 'address', 'salesperson_id'])
                    ->find($state);

                if (empty($customer)) {
                    return;
                }

                $set('persona_model', $customer::class);
                $set('persona_identification_number', $customer->getAttributeValue('identification_number'));
                $set('persona_business_name', $customer->getAttributeValue('business_name'));
                $set('persona_email', $customer->getAttributeValue('email'));
                $set('persona_address', $customer->getAttributeValue('address'));
                $set('salesperson_id', $customer->getAttributeValue('salesperson_id'));
                $set('final_consumer', $customer->getAttributeValue('identification_number') === finalConsumerNumber());

                $livewire->validateOnly($component->getStatePath());
            })
            ->searchable(['business_name', 'identification_number', 'customer_id'])
            ->createOptionModalHeading(__('Create New Customer'))
            ->editOptionModalHeading(__('Edit Customer'))
            ->manageOptionForm(fn (Form $form, Get $get) => CustomerResource::form($form, false)->disabled(! empty($get('final_consumer'))))
            ->manageOptionActions(fn (Action $action) => $action->modalWidth(MaxWidth::SevenExtraLarge))
            ->default(function ($state, $operation) {
                if ($operation === 'create' && filled(request()->input('persona_id'))) {
                    return request()->input('persona_id');
                }

                return $state;
            })
            ->disableOptionWhen(fn (Get $get) => ! empty($get('final_consumer')))
            ->required(fn (Get $get) => ! $get('final_consumer'));
    }
}
