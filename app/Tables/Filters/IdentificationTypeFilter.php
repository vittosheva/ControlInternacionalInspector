<?php

namespace App\Tables\Filters;

use App\Enums\IdentificationTypeEnum;
use Filament\Tables\Filters\SelectFilter;

class IdentificationTypeFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Identification Type'))
            ->options(IdentificationTypeEnum::arrayTranslateWithKeys())
            ->multiple();
    }
}
