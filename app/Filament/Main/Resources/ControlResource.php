<?php

namespace App\Filament\Main\Resources;

use App\Actions\Filament\GeneratePdfAction;
use App\Actions\Filament\SendEmailAction;
use App\Actions\Filament\SendWhatsAppMessageAction;
use App\Actions\Filament\ViewPdfAction;
use App\Filament\Main\Resources\ControlResource\Pages\CreateControl;
use App\Filament\Main\Resources\ControlResource\Pages\EditControl;
use App\Filament\Main\Resources\ControlResource\Pages\ListControls;
use App\Filament\Main\Resources\ControlResource\Pages\ViewControl;
use App\Livewire\HoseDetailsPanel;
use App\Livewire\HosesPanel;
use App\Models\Inspections\Company;
use App\Models\Inspections\ControlRecord;
use App\Models\Inspections\Station;
use App\Tables\Columns\CreatedAtColumn;
use App\Tables\Filters\CreatedAtRangeFilter;
use App\Tables\Filters\DateRangeFilter;
use App\Tables\Filters\IsActiveFilter;
use Exception;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Livewire;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Livewire\Component;

class ControlResource extends Resource
{
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
                        ->description('Datos importantes de la inspección')
                        ->schema([
                            Section::make()
                                ->schema(static::getheaderStatistics())
                                ->hiddenOn('create')
                                ->columns(6),
                            Section::make()
                                ->schema(static::getHeaderdata())
                                ->columns(12),
                        ])
                        ->columnSpanFull(),
                    Step::make(__('Inspections'))
                        ->key('inspections')
                        ->description('Pantalla para las inspecciones')
                        ->schema([
                            Grid::make()
                                ->schema(fn (Get $get, string $operation) => static::getInspections($get, $operation))
                                ->columns(1),
                        ])
                        ->columnSpanFull(),
                    Step::make(__('Summary'))
                        ->key('summary')
                        ->description('Resumen total de la inspección realizada')
                        ->schema([
                            Section::make()
                                ->schema(static::getFinalDetails())
                                ->columns(1),
                        ])
                        ->columnSpanFull(),
                ])
                    ->startOnStep(1)
                    ->skippable(fn ($operation) => $operation === 'view')
                    ->columnSpanFull(),
            ])
            ->columns(12);
    }

    protected static function getHeaderStatistics(): array
    {
        return [
            Placeholder::make('created_at')
                ->label(__('Created At'))
                ->content(fn ($record): ?string => $record->created_at ?? '-'),

            Placeholder::make('updated_at')
                ->label(__('Updated At 2'))
                ->content(fn ($record): ?string => $record->updated_at ?? '-'),
        ];
    }

    protected static function getHeaderData(): array
    {
        return [
            TextInput::make('inspection_date')
                ->label(__('Inspection Date'))
                ->default(now()->format('d-m-Y'))
                ->extraInputAttributes(['class' => 'text-center'])
                ->disabled()
                ->required()
                ->columnSpan(2),

            Select::make('company_id')
                ->label(__('Trading Company'))
                ->relationship('company', 'name')
                ->afterStateUpdated(function (Set $set, $state) {
                    $company = Company::query()->find($state, [
                        'price_extra',
                        'price_super',
                        'price_diesel_1',
                        'price_diesel_2',
                        'price_eco_plus',
                    ]);

                    $set('station_id', null);

                    $set('price_extra', $company->price_extra ?? null);
                    $set('price_super', $company->price_super ?? null);
                    $set('price_diesel_1', $company->price_diesel_2 ?? null);
                    $set('price_eco_plus', $company->price_eco_plus ?? null);
                })
                ->searchable()
                ->selectablePlaceholder(false)
                ->required()
                ->columnSpan(3),

            Select::make('station_id')
                ->label(__('Gas Station'))
                ->relationship('station', 'name', function (Builder $query, Get $get, $operation) {
                    if ($operation === 'view') {
                        return $query;
                    }

                    if (empty($get('company_id'))) {
                        return $query->whereNull('id');
                    }

                    $stationsWithInspectionsInThisYearAndMonth = ControlRecord::query()
                        ->where('year', '=', date('Y'))
                        ->where('month', '=', date('n'))
                        ->where('company_id', '=', $get('company_id'))
                        ->pluck('station_id')
                        ->toArray();

                    return $query
                        ->where('company_id', '=', $get('company_id'))
                        ->whereNotIn('id', $stationsWithInspectionsInThisYearAndMonth);
                })
                ->disableOptionWhen(fn (Get $get) => blank($get('company_id')))
                ->live()
                ->afterStateUpdated(function (Get $get, Set $set, $state) {
                    $street = Station::query()
                        ->find($state, ['id', 'street'])
                        ->getAttributeValue('street');

                    $set('address', ! empty($street) ? $street : 'Sin dirección');
                })
                ->preload()
                ->searchable()
                ->selectablePlaceholder(false)
                ->required()
                ->columnSpan(3),

            TextInput::make('address')
                ->label(__('Address'))
                ->afterStateHydrated(function (Get $get, Set $set) {
                    if (! empty($get('station_id'))) {
                        $street = Station::query()
                            ->find($get('station_id'), ['id', 'street'])
                            ->getAttributeValue('street');

                        return $set('address', ! empty($street) ? $street : 'Sin dirección');
                    }

                    return null;
                })
                ->disabled()
                ->dehydrated(false)
                ->columnSpan(4),

            Fieldset::make('PRECIOS')
                ->schema([
                    TextInput::make('price_extra')
                        ->label(__('Extra'))
                        ->numeric()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                        ->placeholder(__('USD$'))
                        ->required(),
                    TextInput::make('price_super')
                        ->label(__('Super'))
                        ->numeric()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                        ->placeholder(__('USD$'))
                        ->required(),
                    TextInput::make('price_diesel_2')
                        ->label(__('Diesel Premium'))
                        ->numeric()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                        ->placeholder(__('USD$'))
                        ->required(),
                    TextInput::make('price_eco_plus')
                        ->label(__('Eco País'))
                        ->numeric()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Component $livewire, TextInput $component) => $livewire->validateOnly($component->getStatePath()))
                        ->placeholder(__('USD$'))
                        ->required(),
                ])
                ->columns(4),
        ];
    }

    protected static function getInspections($get, $operation): array
    {
        return [
            Livewire::make(HosesPanel::class, [
                    'operation' => $operation,
                    'companyId' => $get('company_id'),
                    'stationId' => $get('station_id'),
                ])
                ->visible(function (Get $get) use ($operation) {
                    if ($operation === 'view') {
                        return false;
                    }

                    return $get('company_id') &&
                        $get('station_id') &&
                        $get('price_extra') &&
                        $get('price_super') &&
                        $get('price_diesel_1') &&
                        $get('price_eco_plus');
                }),
            Livewire::make(HoseDetailsPanel::class, fn ($record) => [
                    'record' => $record,
                ])
                ->visible(fn () => $operation === 'view'),
        ];
    }

    protected static function getFinalDetails(): array
    {
        return [
            MarkdownEditor::make('inspector_notes')
                ->label(__('Notes'))
                ->columnSpan('full'),
        ];
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('inspection_date')
                    ->label(__('Inspection Date'))
                    ->date('d-m-Y')
                    ->sortable()
                    ->toggleable(false),
                TextColumn::make('company.name')
                    ->label(__('Trading Company'))
                    ->numeric()
                    ->toggleable(false),
                TextColumn::make('station.name')
                    ->label(__('Gas Station'))
                    ->numeric()
                    ->searchable()
                    ->toggleable(false),
                TextColumn::make('year')
                    ->label(__('Year'))
                    ->alignCenter()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('month')
                    ->label(__('Month'))
                    ->formatStateUsing(fn ($state) => ucfirst(Date::parse($state)->format('F')))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('bathroomState.name')
                    ->label(__('Bathroom States'))
                    ->numeric()
                    ->alignCenter()
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('active')
                    ->label(__('Is Active?'))
                    ->boolean(),
                CreatedAtColumn::make('created_at'),
            ])
            ->recordUrl(function (Model $record) {
                if (auth()->user()->isAdmin()) {
                    return EditControl::getUrl([$record->getAttributeValue('id')]);
                }

                return ViewControl::getUrl([$record->getAttributeValue('id')]);
            })
            ->filters([
                DateRangeFilter::make('inspection_date')
                    ->label(__('Inspection Date'))
                    ->from('inspection_date')
                    ->to('inspection_date')
                    ->columnSpan(2),
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
                                    ->native(false),
                                Select::make('station_id')
                                    ->label(__('Gas Station'))
                                    ->relationship('station', 'name', function (Builder $query, Get $get) {
                                        return $query
                                            ->where('company_id', '=', blank($get('company_id')) ? 0 : $get('company_id'))
                                            ->oldest('name');
                                    })
                                    ->preload()
                                    ->multiple()
                                    ->native(false),
                            ]),
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
                    ->columnSpan(3),
                SelectFilter::make('periods')
                    ->form([
                        Fieldset::make(__('Periods'))
                            ->schema([
                                Select::make('year')
                                    ->label(__('Year'))
                                    ->options(ControlRecord::query()->groupBy('year')->latest('year')->pluck('year', 'year')->toArray())
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
                    ->columns(12)
                    ->columnSpan(2),
                CreatedAtRangeFilter::make('created_at')
                    ->columnSpan(2)
                    ->visible(false),
                IsActiveFilter::make('active')
                    ->query(function (Builder $query, array $state) {
                        if (empty($state['values'])) {
                            return $query;
                        }

                        return $query->whereIn('active', $state['values']);
                    }),
            ])
            ->filtersLayout(FiltersLayout::AboveContent)
            ->filtersFormColumns(8)
            ->actions([
                ActionGroup::make([
                    ActionGroup::make([
                        EditAction::make()->visible(auth()->user()->isAdmin()),
                        ViewAction::make(),
                    ])
                        ->dropdown(false),
                    SendEmailAction::make()->visible(auth()->user()->isAdmin()),
                    SendWhatsAppMessageAction::make()->visible(auth()->user()->isAdmin()),
                    ActionGroup::make([
                        GeneratePdfAction::make(),
                        ViewPdfAction::make(),
                    ])
                        ->dropdown(false),
                    DeleteAction::make()
                        ->requiresConfirmation()
                        ->visible(auth()->user()->isAdmin()),
                    RestoreAction::make()
                        ->requiresConfirmation()
                        ->visible(auth()->user()->isAdmin()),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->visible(auth()->user()->isAdmin()),
                ]),
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
            ->defaultSort('created_at', 'desc');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('created_by', '=', auth()->id());
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
            'index' => ListControls::route('/'),
            'create' => CreateControl::route('/create'),
            'view' => ViewControl::route('/{record}'),
            'edit' => EditControl::route('/{record}/edit'),
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
