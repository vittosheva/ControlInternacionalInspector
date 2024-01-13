<?php

namespace App\Filament\SuperAdmin\Resources\EmployeeResource\Widgets;

use App\Filament\SuperAdmin\Resources\EmployeeResource;
use App\Tables\Columns\NumberFormatColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LatestEmployees extends TableWidget
{
    public function table(Table $table): Table
    {
        $model = app(EmployeeResource::getModel());

        return $table
            ->heading(__('Latest Employees'))
            ->description(__('Top 5 de últimos empleados creados.'))
            ->query(
                $model::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                NumberFormatColumn::make('id')
                    ->label(__('Employee No'))
                    ->formatStateUsing(fn (string $state): string => idNumberFormat($state, $model::getPrefixName(), true, '-'))
                    ->url(fn ($record) => EmployeeResource::getUrl('view', ['record' => $record->id]))
                    //->url(fn ($record) => route('filament.human-resources.resources.employees.view', ['tenant' => filament()->getTenant()->getAttributeValue('ruc'), 'record' => $record->id]), true)
                    ->searchable(false)
                    ->toggleable(false)
                    ->sortable(false),
                TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(false)
                    ->toggleable(false)
                    ->sortable(false),
                TextColumn::make('identification_number')
                    ->label(__('Identification Number'))
                    ->searchable(false)
                    ->toggleable(false)
                    ->sortable(false),
            ])
            ->recordAction(null)
            ->recordUrl(null)
            ->striped()
            //->deferLoading()
            ->emptyStateActions([])
            ->filters([])
            ->groups([])
            ->bulkActions([])
            ->actions([])
            ->actionsPosition()
            ->paginated(false)
            ->persistSortInSession(false)
            ->persistFiltersInSession(false)
            ->persistSearchInSession(false);
    }
}
