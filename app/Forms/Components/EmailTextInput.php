<?php

namespace App\Forms\Components;

use App\Models\Core\Company;
use App\Models\Persona\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Illuminate\Validation\Rules\Unique;
use Livewire\Component;

class EmailTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Email'))
            ->email()
            ->live(onBlur: true)
            ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
            ->unique(
                table: fn () => $this->getRecord()?->getModel()->getTable() ?? User::getModel()->getTable(),
                column: fn () => $this->statePath,
                ignoreRecord: true,
                modifyRuleUsing: function (Unique $rule, Get $get) {
                    return $rule
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
                            app($this->getModel() ?? User::getModel()) instanceof User, fn ($rule) => $rule->where('main_subscribe_user', 0)
                        )
                        ->when(
                            app($this->getModel()) instanceof User, fn () => $rule->where('main_subscribe_user', 1)
                        )
                        ->where('is_active', 1)
                        ->whereNull('deleted_at');
                })
            ->validationAttribute('email')
            ->prefixIcon('heroicon-o-envelope')
            ->autocomplete('new-password')
            ->required();
    }
}
