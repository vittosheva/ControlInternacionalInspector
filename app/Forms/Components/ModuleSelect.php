<?php

namespace App\Forms\Components;

use App\Models\Common\CategoryType;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;

class ModuleSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Module'))
            ->relationship('categoryType', 'name', fn (Builder $query) => $query
                ->select([
                    ...CategoryType::getModel()->getFillable(),
                    'id',
                ])
            )
            ->createOptionForm(null)
            ->editOptionForm(null)
            ->searchable();
    }
}
