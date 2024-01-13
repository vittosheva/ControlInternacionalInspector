<?php

namespace App\Forms\Components;

use App\Filament\Inventory\Resources\VendorResource;
use App\Models\Persona\Vendor;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class VendorSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Vendor'))
            ->relationship('vendor', 'business_name', fn (Builder $query) => $query
                ->select([
                    ...Vendor::getModel()->getFillable(),
                    'id',
                ])
            )
            ->afterStateUpdated(function ($state, Component $livewire, Select $component, Set $set) {
                $vendor = DB::table(Vendor::getModel()->getTable())
                    ->select(['id', 'identification_number', 'business_name', 'email', 'address'])
                    ->whereNull('deleted_at')
                    ->where('company_id', '=', filament()->getTenant()->getAttributeValue('id'))
                    ->where('is_active', '=', 1)
                    ->find($state);

                $set('persona_model', Vendor::class);
                $set('persona_identification_number', $vendor->identification_number ?? null);
                $set('persona_business_name', $vendor->business_name ?? null);
                $set('persona_email', $vendor->email ?? null);
                $set('persona_address', $vendor->address ?? null);

                $livewire->validateOnly($component->getStatePath());
            })
            ->searchable(['business_name', 'identification_number', 'vendor_id'])
            ->createOptionModalHeading(__('Create New Vendor'))
            ->editOptionModalHeading(__('Edit Vendor'))
            ->manageOptionForm(fn (Form $form) => VendorResource::form($form, false))
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
