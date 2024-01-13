<?php

namespace App\Forms\Components;

use App\Filament\Inventory\Resources\UnitResource;
use App\Models\Setting\Unit;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Builder;

class UnitSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Unit'))
            ->relationship('unit', 'name', fn (Builder $query) => $query
                ->select([
                    ...Unit::getModel()->getFillable(),
                    'id',
                ])
            )
            ->prefixIcon('heroicon-o-adjustments-horizontal')
            ->hintIcon('heroicon-o-information-circle', __('Item Measurement Unit'))
            ->createOptionModalHeading(__('Create New Unit'))
            ->editOptionModalHeading(__('Edit Unit'))
            ->manageOptionForm(fn (Form $form) => UnitResource::form($form, false))
            ->manageOptionActions(fn (Action $action) => $action->modalWidth(MaxWidth::ThreeExtraLarge))
            ->searchable();
    }
}
