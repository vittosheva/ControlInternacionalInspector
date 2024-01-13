<?php

namespace App\Tables\Filters;

use App\Enums\DocumentEnum;
use Filament\Tables\Filters\SelectFilter;

class DocumentFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Document'))
            ->options(DocumentEnum::arrayTranslateWithKeys('onlyElectronics'))
            ->multiple();
    }
}
