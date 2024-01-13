<?php

namespace App\Forms\Components;

use App\Filament\Inventory\Resources\CarrierResource;
use App\Models\Persona\Carrier;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CarrierSelect extends Select
{
    public bool $waybillPersona = false;

    public function waybillPersona(bool $bool = true): static
    {
        $this->waybillPersona = $bool;

        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Carrier'))
            ->relationship('carrier', 'business_name', fn (Builder $query) => $query
                ->select([
                    ...Carrier::getModel()->getFillable(),
                    'id',
                ])
            )
            ->afterStateUpdated(function ($state, Component $livewire, Select $component, Set $set) {
                $carrier = Carrier::query()
                    ->select(['id', 'identification_number', 'business_name', 'email', 'address'])
                    ->whereNull('deleted_at')
                    ->where('company_id', '=', filament()->getTenant()->getAttributeValue('id'))
                    ->where('is_active', '=', 1)
                    ->first($state);

                if (empty($carrier)) {
                    return;
                }

                if (! $this->waybillPersona) {
                    $livewire->validateOnly($component->getStatePath());

                    return;
                }

                $set('persona_model', $carrier::class);
                $set('persona_identification_number', $carrier->getAttributeValue('identification_number'));
                $set('persona_business_name', $carrier->getAttributeValue('business_name'));
                $set('persona_email', $carrier->getAttributeValue('email'));
                $set('persona_address', $carrier->getAttributeValue('address'));

                $livewire->validateOnly($component->getStatePath());
            })
            ->searchable(['business_name', 'identification_number', 'carrier_id'])
            ->createOptionModalHeading(__('Create New Carrier'))
            ->editOptionModalHeading(__('Edit Carrier'))
            ->manageOptionForm(fn (Form $form, Get $get) => CarrierResource::form($form, false))
            ->manageOptionActions(fn (Action $action) => $action->modalWidth(MaxWidth::SevenExtraLarge))
            ->default(function ($state, $operation) {
                if ($operation === 'create' && ! $this->waybillPersona && filled(request()->input('persona_id'))) {
                    return request()->input('persona_id');
                }

                return $state;
            })
            ->disableOptionWhen(fn (Get $get) => ! empty($get('final_consumer')))
            ->required(fn (Get $get) => ! $get('final_consumer'));
    }
}
