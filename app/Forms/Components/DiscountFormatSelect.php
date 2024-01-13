<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Select;
use Filament\Forms\Get;

class DiscountFormatSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Type'))
            ->options([
                '$' => '$',
                '%' => '%',
            ])
            //->disabled(fn (Get $get) => blank($get('item_id')) || blank($get('product_item_id')) || $get('service_item_id'))
            ->default('$')
            ->searchable(false)
            ->selectablePlaceholder(false)
            ->placeholder(null)
            ->extraInputAttributes([
                'class' => 'text-center',
            ])
            ->native();
    }
}
