<?php

namespace App\Tables\Filters;

use App\Enums\ItemTypeEnum;
use Filament\Tables\Filters\SelectFilter;

class ItemTypeFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Type'))
            ->options(ItemTypeEnum::arrayTranslateWithKeys())
            ->multiple();
    }
}
