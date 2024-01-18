<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\EnvironmentalObservationResource\Pages\ManageEnvironmentalObservations;
use App\Models\Inspections\EnvironmentalObservation;
use App\Models\Scopes\IsActiveScope;
use App\Tables\Filters\IsActiveFilter;
use Exception;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EnvironmentalObservationResource extends Resource
{
    protected static ?string $model = EnvironmentalObservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('description')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                TextInput::make('code')
                    ->label(__('Code'))
                    ->required()
                    ->columnSpan(3),
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
                TextColumn::make('code')
                    ->label(__('Code'))
                    ->alignCenter()
                    ->sortable(),
                TextColumn::make('description')
                    ->label(__('Name'))
                    ->html()
                    ->wrap()
                    ->searchable(),
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
                        ->slideOver(),
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('code');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScope(new IsActiveScope());
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageEnvironmentalObservations::route('/'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Environmental Observation');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Environmental Observations');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Observation & Services');
    }
}
