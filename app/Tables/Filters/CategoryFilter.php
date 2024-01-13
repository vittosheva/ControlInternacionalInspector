<?php

namespace App\Tables\Filters;

use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends SelectFilter
{
    public ?string $categoryTypeId = null;

    public function categoryTypeId($categoryTypeId): static
    {
        $this->categoryTypeId = $categoryTypeId;

        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Category'))
            ->relationship('category', 'name', fn (Builder $query) => $query
                ->select(['id', 'name'])
                ->where('category_type_id', '=', $this->categoryTypeId)
            )
            ->multiple();
    }
}
