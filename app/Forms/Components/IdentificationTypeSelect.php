<?php

namespace App\Forms\Components;

use App\Enums\IdentificationTypeEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;

class IdentificationTypeSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Identification Type'))
            ->options(IdentificationTypeEnum::arrayTranslate())
            ->afterStateUpdated(function (Get $get, Set $set, string|null|IdentificationTypeEnum $state) {
                if (! empty($state->value)) {
                    $set('persona_type', 'NAT');
                }
            })
            ->required();
    }
}
