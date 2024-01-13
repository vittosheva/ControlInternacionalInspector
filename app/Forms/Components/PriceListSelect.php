<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Illuminate\Support\Str;

class PriceListSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Price List'))
            ->options(function (Get $get): array {
                return Str::of($get('hidden_price_list'))
                    ->explode(',')
                    ->mapWithKeys(function ($price, $key) {
                        if (empty($price) || $price == 0) {
                            return [];
                        }

                        return [
                            $price => '<span class="text-slate-500">Precio '.($key + 1).':</span> '.moneyFormat($price),
                        ];
                    })
                    ->toArray();
            })
            ->dehydrated(false)
            ->allowHtml();
    }
}
