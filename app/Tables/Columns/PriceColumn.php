<?php

namespace App\Tables\Columns;

use Filament\Support\Enums\Alignment;
use Filament\Tables\Columns\TextColumn;

class PriceColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->formatStateUsing(fn ($state) => moneyFormat($state))
            ->alignment(Alignment::Right)
            ->numeric(
                config('dorsi.decimals.min'),
                config('dorsi.figure_decimal_separator'),
                config('dorsi.figure_thousand_separator')
            )
            //->money('USD')
            ->toggleable();
    }
}
