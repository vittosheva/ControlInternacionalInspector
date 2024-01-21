<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\InspectorResource\Pages\ManageInspectors;
use App\Models\Persona\User;
use App\Models\Scopes\IsActiveScope;
use Exception;
use Filament\Forms\Components\Hidden;
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
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class InspectorResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label(__('Email'))
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('password')
                    ->label(__('Password'))
                    ->password()
                    ->revealable()
                    ->dehydrated(function ($operation, $state): bool {
                        if (! empty($state)) {
                            return true;
                        }

                        if ($operation === 'create') {
                            return true;
                        }

                        return false;
                    })
                    ->required(fn ($operation): bool => $operation === 'create')
                    ->columnSpanFull(),
                Hidden::make('email_verified_at')
                    ->default(now())
                    ->dehydrated(fn ($operation): bool => $operation === 'create'),
                Toggle::make('is_allowed_to_login')
                    ->label(__('Is Allowed To Login?'))
                    ->inline(false)
                    ->default(true)
                    ->columnSpan(3),
                Toggle::make('is_active')
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
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('Email'))
                    ->copyable()
                    ->searchable(),
                IconColumn::make('is_allowed_to_login')
                    ->label(__('Is Allowed To Login?'))
                    ->boolean()
                    ->alignCenter(),
                IconColumn::make('is_active')
                    ->label(__('Active'))
                    ->boolean()
                    ->alignCenter(),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->alignCenter(),
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
            ->defaultSort('created_at');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScope(new IsActiveScope())
            ->where('is_super', '=', 0)
            ->role('Inspector');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageInspectors::route('/'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Inspector');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Inspectors');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Controls');
    }
}
