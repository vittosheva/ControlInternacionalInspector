<?php

namespace App\Forms\Components;

use App\Enums\ItemTypeEnum;
use Filament\Forms\Components\Select;

class ItemTypeSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Type'))
            ->options(ItemTypeEnum::arrayTranslateWithKeys())
            ->searchable(false)
            ->default(ItemTypeEnum::GOOD->value);
    }
}
