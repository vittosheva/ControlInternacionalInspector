<?php

namespace App\Filament\Main\Resources;

use App\Actions\Filament\GeneratePdfAction;
use App\Actions\Filament\ViewPdfAction;
use App\Filament\Main\Resources\InspectionResource\Pages\CreateInspection;
use App\Filament\Main\Resources\InspectionResource\Pages\EditInspection;
use App\Filament\Main\Resources\InspectionResource\Pages\ListInspections;
use App\Filament\Main\Resources\InspectionResource\Pages\ViewInspection;
use App\Models\Inspections\ControlRecord;
use App\Models\Persona\User;
use App\Tables\Columns\CreatedAtColumn;
use App\Tables\Filters\DateRangeFilter;
use App\Traits\InspectionFormTrait;
use Exception;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class InspectionResource extends Resource
{
    use InspectionFormTrait;

    protected static ?string $model = ControlRecord::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make(__('Main Information'))
                        ->key('main_information')
                        ->description('Datos principales')
                        ->schema([
                            Section::make()
                                ->schema(static::getHeaderStatistics())
                                ->hiddenOn('create')
                                ->columns(6),
                            Section::make()
                                ->schema(static::getHeaderData())
                                ->columns(12),
                        ])
                        ->columnSpanFull(),
                    Step::make(__('Inspections'))
                        ->key('inspections')
                        ->description('Pantalla para inspecciones de mangueras')
                        ->schema([
                            Grid::make()
                                ->schema(fn ($record, $operation, Get $get) => static::getInspections($record, $get, $operation))
                                ->columns(1),
                        ])
                        ->beforeValidation(function (Get $get) {
                            if (auth()->user()->isAdmin()) {
                                return true;
                            }

                            if (! empty($get('hose_inspections_completed')) || $get('hose_inspections_completed')) {
                                return true;
                            }

                            Notification::make()
                                ->title('No ha realizado las inspecciones necesarias')
                                ->danger()
                                ->color(Color::Red)
                                ->send();

                            return false;
                        })
                        ->columnSpanFull(),
                    Step::make(__('Tanks'))
                        ->key('tanks')
                        ->description('Pantalla para medidas de tanques')
                        ->schema([
                            Grid::make()
                                ->schema(fn () => static::getTanks())
                                ->columns(12),
                        ])
                        ->columnSpanFull(),
                    Step::make(__('Observations'))
                        ->key('observations')
                        ->description('Pantalla para observaciones complementarias')
                        ->schema([
                            Grid::make()
                                ->schema(fn () => static::getObservations())
                                ->columns(12),
                        ])
                        ->columnSpanFull(),
                    Step::make(__('Summary'))
                        ->key('summary')
                        ->description('Resumen de la inspección')
                        ->schema([
                            Grid::make()
                                ->schema(fn () => static::getFinalDetails())
                                ->columns(12),
                        ])
                        ->columnSpanFull(),
                ])
                    ->nextAction(fn (Action $action) => $action->label(fn () => __('Next').' ->')->color(Color::Gray))
                    ->previousAction(fn (Action $action) => $action->label(fn () => '<- '.__('Previous')))
                    ->startOnStep(1)
                    ->skippable(fn ($operation) => in_array($operation, ['edit', 'view']))
                    ->columnSpanFull(),
            ])
            ->columns(12);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->heading('Control de inspecciones a E/S')
            ->description('El objetivo principal del control es verificar que los surtidores de combustibles estén bien calibrados y que las estaciones vendan la cantidad exacta que pagan los consumidores.')
            ->columns([
                TextColumn::make('inspection_date')
                    ->label(__('Inspection Date'))
                    ->date('d-m-Y')
                    ->toggleable(false),
                TextColumn::make('company.name')
                    ->label(__('Trading Company'))
                    ->toggleable(false),
                TextColumn::make('station.name')
                    ->label(__('Gas Station'))
                    ->toggleable(false),
                TextColumn::make('year')
                    ->label(__('Year'))
                    ->alignCenter()
                    ->sortable()
                    ->visible(auth()->user()->isAdmin()),
                TextColumn::make('month')
                    ->label(__('Month'))
                    ->formatStateUsing(fn ($state) => ucfirst(Date::parse($state)->format('F')))
                    ->sortable()
                    ->visible(auth()->user()->isAdmin()),
                TextColumn::make('creator.name')
                    ->label(__('Created By'))
                    ->visible(auth()->user()->isAdmin()),
                CreatedAtColumn::make('created_at')
                    ->toggleable(false),
            ])
            ->recordUrl(function (Model $record) {
                if (auth()->user()->isAdmin() || $record->admin_authorization) {
                    return EditInspection::getUrl([$record->getAttributeValue('id')]);
                }

                return ViewInspection::getUrl([$record->getAttributeValue('id')]);
            })
            ->filters([
                SelectFilter::make('companies')
                    ->form([
                        Fieldset::make(__('Gas Stations'))
                            ->schema([
                                Select::make('company_id')
                                    ->label(__('Trading Company'))
                                    ->relationship('company', 'name', fn (Builder $query) => $query->oldest('name'))
                                    ->afterStateUpdated(function ($state, Set $set) {
                                        $set('station_id', null);
                                    })
                                    ->reactive()
                                    ->preload()
                                    ->native(false)
                                    ->columnSpan(5),
                                Select::make('station_id')
                                    ->label(__('Gas Station'))
                                    ->relationship('station', 'name', function (Builder $query, Get $get) {
                                        $query = $query->oldest('name');

                                        if (empty($get('company_id'))) {
                                            return $query;
                                        }

                                        return $query->where('company_id', '=', $get('company_id'));
                                    })
                                    ->preload()
                                    ->native(false)
                                    ->columnSpan(7),
                            ])
                            ->columns(12),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (! empty($data['company_id'])) {
                            $query->where('company_id', '=', $data['company_id']);
                        }

                        if (! empty($data['station_id'])) {
                            $query->where('station_id', '=', $data['station_id']);
                        }

                        return $query;
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if (! empty($data['company_id'])) {
                            $indicators[__('Trading Company')] = __('Trading Company').' '.$data['company_id'];
                        }

                        if (! empty($data['station_id'])) {
                            $indicators[__('Gas Station')] = __('Gas Station').' '.$data['station_id'];
                        }

                        return $indicators;
                    })
                    ->columnSpan(5),
                DateRangeFilter::make('inspection_date')
                    ->label(__('Inspection Date'))
                    ->from('inspection_date')
                    ->to('inspection_date')
                    ->columnSpan(4),
                SelectFilter::make('periods')
                    ->form([
                        Fieldset::make(__('Periods'))
                            ->schema([
                                Select::make('year')
                                    ->label(__('Year'))
                                    ->options(ControlRecord::query()->groupBy('year')->latest('year')->pluck('year', 'year')->toArray())
                                    ->default(date('Y'))
                                    ->native(false)
                                    ->columnSpan(1),
                                Select::make('month')
                                    ->label(__('Month'))
                                    ->options(
                                        collect(today()->startOfMonth()->subMonths(12)->monthsUntil(today()->startOfMonth()))
                                            ->mapWithKeys(fn ($month) => [$month->month => ucfirst($month->monthName)])
                                            ->toArray()
                                    )
                                    ->native(false)
                                    ->columnSpan(1),
                            ])
                            ->columns()
                            ->columnSpanFull(),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (! empty($data['year'])) {
                            $query->where('year', '=', $data['year']);
                        }

                        if (! empty($data['month'])) {
                            $query->where('month', '=', $data['month']);
                        }

                        return $query;
                    })
                    ->visible(auth()->user()->isAdmin())
                    ->columns(12)
                    ->columnSpan(3),
            ])
            ->filtersLayout(FiltersLayout::AboveContent)
            ->filtersFormColumns(12)
            ->hiddenFilterIndicators()
            ->actions([
                ActionGroup::make([
                    ActionGroup::make([
                        EditAction::make()
                            ->visible(fn ($record) => $record->admin_authorization || auth()->user()->isAdmin()),
                        ViewAction::make(),
                    ])
                        ->dropdown(false),
                    ActionGroup::make([
                        \Filament\Tables\Actions\Action::make(__('Autorizar reingreso'))
                            ->icon('lucide-fingerprint')
                            ->form([
                                Fieldset::make(__('Reingreso'))
                                    ->schema([
                                        Select::make('created_by')
                                            ->label(__('Autorizar a'))
                                            ->options(User::query()
                                                ->role('Inspector')
                                                ->orderBy('name')
                                                ->pluck('name', 'id')
                                                ->toArray())
                                            ->default(fn ($record) => $record->created_by),
                                        Radio::make('admin_authorization')
                                            ->label('Autorización')
                                            ->options([
                                                1 => __('Yes'),
                                                0 => __('No'),
                                            ])
                                            ->inline()
                                            ->required(),
                                    ])
                                    ->columns(1),
                            ])
                            ->action(function ($record, $data) {
                                $record->created_by = $data['created_by'];
                                $record->admin_authorization = $data['admin_authorization'];
                                $record->save();

                                Notification::make()
                                    ->title('Registro actualizado')
                                    ->success()
                                    ->color(Color::Emerald)
                                    ->send();
                            })
                            ->requiresConfirmation()
                            ->visible(auth()->user()->isAdmin()),
                    ])
                        ->dropdown(false),
                    ActionGroup::make([
                        GeneratePdfAction::make(),
                        ViewPdfAction::make(),
                    ])
                        ->dropdown(false)
                        ->visible(auth()->user()->isAdmin()),
                    DeleteAction::make()
                        ->visible(auth()->user()->isAdmin()),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->visible(auth()->user()->isAdmin()),
                ])
                    ->visible(auth()->user()->isAdmin()),
            ])
            ->groups([
                Group::make('inspection_date')
                    ->label(__('Inspection Date'))
                    ->date()
                    ->getTitleFromRecordUsing(fn ($record) => Date::parse(data_get($record, 'inspection_date'))->format(Table::$defaultDateDisplayFormat))
                    ->collapsible(),
                Group::make('company_id')
                    ->label(__('Company'))
                    ->getTitleFromRecordUsing(fn ($record) => $record->company->name)
                    ->collapsible(),
            ])
            ->defaultSort('created_at', 'desc')
            ->deferLoading();
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->when(! auth()->user()->isAdmin(), fn (Builder $query) => $query
                ->where('created_by', '=', auth()->id())
            );
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInspections::route('/'),
            'create' => CreateInspection::route('/create'),
            'view' => ViewInspection::route('/{record}'),
            'edit' => EditInspection::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Inspections');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Inspections');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Controls');
    }
}
