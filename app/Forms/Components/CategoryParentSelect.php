<?php

namespace App\Forms\Components;

use App\Models\Inventory\Category;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Builder;

class CategoryParentSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Category Parent'))
            ->relationship('parent', 'name', fn (Builder $query, Get $get) => $query
                ->select([
                    ...Category::getModel()->getFillable(),
                    'id',
                ])
                ->where('category_type_id', '=', $get('category_type_id'))
            )
            ->prefixIcon('heroicon-o-rectangle-group')
            ->createOptionModalHeading(__('Create New Category'))
            ->createOptionForm(function (Get $get) {
                if (auth()->user()->can('create Category')) {
                    return [
                        Section::make()
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('Name'))
                                    ->columnSpan(7)
                                    ->required(),
                                ModuleSelect::make('category_type_id')
                                    ->label(__('Module'))
                                    ->default($get('category_type_id'))
                                    ->columnSpan(5)
                                    ->required(),
                            ])
                            ->columns(12),
                    ];
                }

                return null;
            })
            ->editOptionModalHeading(__('Edit Category'))
            ->editOptionForm(function (Get $get) {
                if (auth()->user()->can('edit Category')) {
                    return [
                        Section::make()
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('Name'))
                                    ->columnSpan(7)
                                    ->required(),
                                ModuleSelect::make('category_type_id')
                                    ->label(__('Module'))
                                    ->default($get('category_type_id'))
                                    ->columnSpan(5)
                                    ->required(),
                            ])
                            ->columns(12),
                    ];
                }

                return null;
            })
            ->manageOptionActions(fn (Action $action) => $action->slideOver())
            ->searchable();
    }
}
