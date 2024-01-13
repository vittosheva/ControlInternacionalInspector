<?php

namespace App\Forms\Components;

use App\Filament\Inventory\Resources\CategoryResource;
use App\Models\Inventory\Category;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Builder;

class CategorySelect extends Select
{
    protected ?string $categoryTypeId = null;

    public function categoryTypeId($id): static
    {
        $this->categoryTypeId = $id;

        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Category'))
            ->relationship('category', 'name', fn (Builder $query) => $query
                ->select([
                    ...Category::getModel()->getFillable(),
                    'id',
                ])
                ->when(filled($this->categoryTypeId), fn (Builder $query) => $query->where('category_type_id', '=', $this->categoryTypeId))
            )
            ->prefixIcon('heroicon-o-squares-plus')
            ->createOptionModalHeading(__('Create New Category'))
            ->editOptionModalHeading(__('Edit Category'))
            ->manageOptionForm(fn (Form $form) => CategoryResource::form($form, false))
            ->manageOptionActions(fn (Action $action) => $action->slideOver())
            ->searchable();
    }
}
