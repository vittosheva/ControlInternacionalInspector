<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;

class PriceWithSumColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->formatStateUsing(fn ($state) => moneyFormat($state))
            ->alignRight()
            ->numeric(
                config('dorsi.decimals.min'),
                config('dorsi.figure_decimal_separator'),
                config('dorsi.figure_thousand_separator')
            )
            ->toggleable()
            ->summarize([
                Sum::make()
                    ->label('Total')
                    ->numeric(
                        config('dorsi.decimals.min'),
                        config('dorsi.figure_decimal_separator'),
                        config('dorsi.figure_thousand_separator')
                    ),
                //->money('USD'),
            ]);
    }
}
