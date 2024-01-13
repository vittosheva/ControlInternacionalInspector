<?php

namespace App\Forms\Components;

use App\Filament\Inventory\Resources\ProductResource;
use App\Models\Inventory\Product;
use App\Models\Scopes\IsServiceScope;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProductsSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label('')
            ->placeholder(__('Search Product'))
            ->relationship('product', 'name', fn (Builder $query) => $query
                ->select([
                    ...Product::getModel()->getFillable(),
                    'id',
                ])
                ->withoutGlobalScopes([
                    IsServiceScope::class,
                ])
                ->orderBy($query->qualifyColumn('name'))
            )
            ->searchable(['name'])
            ->getOptionLabelFromRecordUsing(fn (Model $record) => $record->name ?? '')
            ->createOptionModalHeading(__('Create New Product'))
            ->editOptionModalHeading(__('Edit Product'))
            ->manageOptionForm(fn (Form $form) => ProductResource::form($form))
            ->manageOptionActions(fn (Action $action) => $action->modalWidth(MaxWidth::SevenExtraLarge))
            ->allowHtml();
    }
}
