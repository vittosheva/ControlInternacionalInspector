<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\GasStationObservationResource\Pages\ManageGasStationObservations;
use App\Models\Inspections\GasStationObservation;
use App\Models\Scopes\IsActiveScope;
use Exception;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GasStationObservationResource extends Resource
{
    protected static ?string $model = GasStationObservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('priority')
                    ->label(__('Priority'))
                    ->required()
                    ->columnSpan(3),
                ColorPicker::make('color')
                    ->required()
                    ->columnSpan(5),
                Toggle::make('active')
                    ->label(__('Active'))
                    ->inline(false)
                    ->default(true)
                    ->columnSpan(3),
            ])
            ->columns(12);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name'))
                    ->html()
                    ->wrap()
                    ->searchable(),
                TextColumn::make('priority')
                    ->label(__('Priority'))
                    ->alignCenter()
                    ->sortable(),
                ColorColumn::make('color')
                    ->label(__('Color'))
                    ->alignCenter(),
                IconColumn::make('active')
                    ->label(__('Active'))
                    ->boolean(),
            ])
            ->filters([
                /*IsActiveFilter::make('active')
                    ->query(function (Builder $query, array $state) {
                        if (empty($state['values'])) {
                            return $query;
                        }

                        return $query->whereIn('active', $state['values']);
                    }),*/
            ])
            ->filtersLayout(FiltersLayout::AboveContent)
            ->actions([
                ActionGroup::make([
                    EditAction::make()
                        ->modalWidth(MaxWidth::ExtraLarge)
                        ->slideOver(),
                    //DeleteAction::make(),
                    Action::make('active')
                        ->label('Activar/Desactivar')
                        ->icon('heroicon-m-check-circle')
                        ->requiresConfirmation()
                        ->action(function (Model $record) {
                            $record->active = ! $record->active;
                            $record->save();
                        }),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    //DeleteBulkAction::make(),
                    BulkAction::make('active')
                        ->label('Activar/Desactivar')
                        ->icon('heroicon-m-check-circle')
                        ->requiresConfirmation()
                        ->action(function (Collection $records) {
                            $records->each(function ($record) {
                                $record->active = ! $record->active;
                                $record->save();
                            });
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->reorderable('priority', true)
            ->defaultSort('priority');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScope(new IsActiveScope());
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageGasStationObservations::route('/'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Gas Station Observation');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Gas Station Observations');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Observation & Services');
    }
}
