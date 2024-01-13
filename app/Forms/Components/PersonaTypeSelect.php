<?php

namespace App\Forms\Components;

use App\Enums\PersonaTypeEnum;
use Filament\Forms\Components\Select;

class PersonaTypeSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Persona Type'))
            ->options(PersonaTypeEnum::arrayTranslate())
            ->required();
    }
}
