<?php

namespace App\Forms\Components;

use App\Enums\IdentificationTypeEnum;
use App\Models\Core\Company;
use App\Models\Persona\User;
use App\Traits\SriWebServicesTrait;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Illuminate\Validation\Rules\Unique;
use Livewire\Component;

class IdentificationNumberTextInput extends TextInput
{
    use SriWebServicesTrait;

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Identification Number'))
            ->prefixIcon('heroicon-o-identification')
            ->live(onBlur: true)
            ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
            ->unique(
                table: fn () => $this->getRecord()->getModel()->getTable(),
                column: fn () => $this->statePath,
                ignoreRecord: true,
                modifyRuleUsing: fn (Unique $rule, Get $get) => $rule
                    ->ignore($get('id'))
                    ->when(auth()->check(), function () use ($rule, $get) {
                        if (app($this->getModel()) instanceof Company) {
                            return $rule;
                        }

                        if (! empty($get('company_id'))) {
                            $companyId = $get('company_id');
                        } elseif (! empty(filament()->getTenant())) {
                            $companyId = filament()->getTenant()->getAttributeValue('id');
                        } else {
                            return $rule;
                        }

                        return $rule->where('company_id', $companyId);
                    })
                    ->when(
                        ! app($this->getModel()) instanceof Company &&
                        ! empty(filament()->getTenant()) &&
                        app($this->getModel()) instanceof User, fn ($rule) => $rule->where('main_subscribe_user', 0)
                    )
                    ->when(
                        app($this->getModel()) instanceof User, fn () => $rule->where('main_subscribe_user', 1)
                    )
                    ->where('is_active', 1)
                    ->whereNull('deleted_at')
            )
            ->hintAction(fn (): Action => Action::make('external_data')
                ->label('')
                ->icon('heroicon-s-viewfinder-circle')
                ->tooltip(__('External data search'))
                ->iconButton()
                ->visible(fn ($livewire) => auth()->check() ? auth()->user()->can('consume Webservice') : false)
                ->action(function (Component $livewire, TextInput $component, Set $set, Get $get, ?string $state): void {
                    // Reset fields
                    $set('identification_type', null);
                    $set('persona_type', null);

                    // Validation
                    $livewire->validateOnly($component->getStatePath());

                    $label = 'business_name';

                    // Identification Type
                    $identificationType = match (strlen($state)) {
                        10 => IdentificationTypeEnum::CEDULA,
                        13 => IdentificationTypeEnum::RUC,
                        default => null,
                    };

                    if (in_array($state, ['9999999999', finalConsumerNumber()])) {
                        $identificationType = IdentificationTypeEnum::FINAL;
                    }

                    $set('identification_type', $identificationType);

                    if (empty($identificationType)) {
                        Notification::make()
                            ->warning()
                            ->color(Color::Amber)
                            ->body('No se pudo obtener información de '.$state.' en el SRI')
                            ->send();

                        return;
                    }

                    // --------------------------------------------------------------- //
                    // 1.- FIND BY CEDULA
                    // --------------------------------------------------------------- //
                    if ($identificationType === IdentificationTypeEnum::CEDULA) {
                        self::sriWebserviceCedula($state, $label, $set, $get);

                        return;
                    }

                    // --------------------------------------------------------------- //
                    // 2.- FIND BY RUC
                    // --------------------------------------------------------------- //
                    self::sriWebserviceRuc($state, $label, $set, $get);
                }),
            )
            ->required();
    }
}
