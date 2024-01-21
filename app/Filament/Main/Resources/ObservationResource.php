<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\ObservationResource\Pages\ManageObservations;
use App\Models\Inspections\Observation;
use App\Models\Scopes\IsActiveScope;
use Exception;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Actions\ActionGroup;
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

class ObservationResource extends Resource
{
    protected static ?string $model = Observation::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?int $navigationSort = 1;

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
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => ManageObservations::route('/'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Observation');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Observations');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Observation & Services');
    }
}
