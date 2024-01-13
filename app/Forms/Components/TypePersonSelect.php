<?php

namespace App\Forms\Components;

use App\Enums\IdentificationTypeEnum;
use App\Enums\TypePersonEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;

class TypePersonSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Type Person'))
            ->options(TypePersonEnum::arrayTranslateWithKeys())
            ->afterStateUpdated(function (Get $get, Set $set, string|null|IdentificationTypeEnum $state) {
                if (! empty($state->value)) {
                    $set('persona_type', 'NAT');
                }
            });
    }
}
