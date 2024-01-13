<?php

namespace App\Forms\Components;

use App\Filament\Inventory\Resources\ServiceResource;
use App\Models\Inventory\Service;
use App\Models\Scopes\IsProductScope;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ServicesSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label('')
            ->placeholder(__('Search Service'))
            ->relationship('service', 'name', fn (Builder $query) => $query
                ->select([
                    ...Service::getModel()->getFillable(),
                    'id',
                ])
                ->withoutGlobalScopes([
                    IsProductScope::class,
                ])
                ->orderBy($query->qualifyColumn('name'))
            )
            ->searchable(['name'])
            ->getOptionLabelFromRecordUsing(fn (Model $record) => $record->name ?? '')
            ->createOptionModalHeading(__('Create New Service'))
            ->editOptionModalHeading(__('Edit Service'))
            ->manageOptionForm(fn (Form $form) => ServiceResource::form($form))
            ->manageOptionActions(fn (Action $action) => $action->modalWidth(MaxWidth::SevenExtraLarge))
            ->allowHtml();
    }
}
