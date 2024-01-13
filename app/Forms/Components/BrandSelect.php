<?php

namespace App\Forms\Components;

use App\Filament\Inventory\Resources\BrandResource;
use App\Models\Inventory\Brand;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Builder;

class BrandSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Brand'))
            ->relationship('brand', 'name', fn (Builder $query) => $query
                ->select([
                    ...Brand::getModel()->getFillable(),
                    'id',
                ])
            )
            ->prefixIcon('heroicon-o-at-symbol')
            ->createOptionModalHeading(__('Create New Brand'))
            ->editOptionModalHeading(__('Edit Brand'))
            ->manageOptionForm(fn (Form $form) => BrandResource::form($form, false))
            ->manageOptionActions(fn (Action $action) => $action->slideOver())
            ->searchable();
    }
}
