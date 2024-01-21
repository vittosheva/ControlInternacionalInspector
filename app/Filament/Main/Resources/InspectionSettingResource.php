<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\InspectionSettingResource\Pages;
use App\Models\Inspections\InspectionSetting;
use App\Models\Scopes\IsActiveScope;
use App\Tables\Filters\IsActiveFilter;
use Exception;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
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

class InspectionSettingResource extends Resource
{
    protected static ?string $model = InspectionSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Toggle::make('active')
                    ->label(__('Active')),
            ]);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('#')),
                TextColumn::make('name')
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
                        ->modalWidth(MaxWidth::ThreeExtraLarge)
                        ->slideOver(),
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScope(new IsActiveScope());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageInspectionSettings::route('/'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Inspection Report');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Inspection Report');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Variables');
    }
}
