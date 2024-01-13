<?php

namespace App\Tables\Filters;

use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class ModuleFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Module'))
            ->relationship('categoryType', 'name', fn (Builder $query) => $query->select(['id', 'name'])
            )
            ->multiple();
    }
}
