<?php

namespace App\Forms\Components;

use App\Enums\GenderEnum;
use Filament\Forms\Components\Select;

class GenderSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Gender'))
            ->options(GenderEnum::arrayTranslateWithKeys());
    }
}
