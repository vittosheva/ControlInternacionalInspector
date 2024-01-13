<?php

namespace App\Filament\SuperAdmin\Resources;

use App\Filament\SuperAdmin\Resources\CompanyResource\Pages\CreateCompany;
use App\Filament\SuperAdmin\Resources\CompanyResource\Pages\EditCompany;
use App\Filament\SuperAdmin\Resources\CompanyResource\Pages\ListCompanies;
use App\Filament\SuperAdmin\Resources\CompanyResource\Pages\ViewCompany;
use App\Models\Core\Company;
use App\Models\Scopes\IsActiveScope;
use App\Tables\Columns\CreatedAtColumn;
use App\Tables\Columns\IsActiveColumn;
use App\Tables\Columns\NameColumn;
use Exception;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('environment_id')
                    ->relationship('environment', 'name', fn (Builder $query) => $query->select(['id', 'name', 'code']))
                    ->required()
                    ->default(1),
                TextInput::make('ruc')
                    ->required()
                    ->maxLength(13),
                TextInput::make('business_activity_id')
                    ->numeric(),
                TextInput::make('main_user_id')
                    ->maxLength(9),
                TextInput::make('country_id')
                    ->numeric(),
                TextInput::make('created_by')
                    ->numeric(),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->maxLength(191),
                TextInput::make('sri_password')
                    ->password()
                    ->maxLength(255),
                TextInput::make('telephone')
                    ->tel()
                    ->maxLength(30),
                TextInput::make('logo')
                    ->maxLength(191),
                TextInput::make('favicon')
                    ->maxLength(191),
                TextInput::make('website')
                    ->maxLength(191),
                Textarea::make('address')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                TextInput::make('legal_representative')
                    ->maxLength(100),
                Textarea::make('electronic_signature_file')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Textarea::make('electronic_signature_password')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Toggle::make('currently_using'),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('updated_by')
                    ->numeric(),
                TextInput::make('deleted_by')
                    ->numeric(),
            ]);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ruc')
                    ->label(__('RUC'))
                    ->searchable()
                    ->toggleable(),
                NameColumn::make('name')
                    ->toggleable(),
                TextColumn::make('email')
                    ->label(__('Email'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('telephone')
                    ->label(__('Telephone'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('website')
                    ->label(__('Website'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('legal_representative')
                    ->label(__('Legal Representative'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('businessActivity.name')
                    ->label(__('Business Activity'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('environment_id')
                    ->label(__('Environment'))
                    ->badge(false)
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                IsActiveColumn::make('is_active')
                    ->toggleable(),
                CreatedAtColumn::make('created_at'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                CreateAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
                IsActiveScope::class,
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCompanies::route('/'),
            'create' => CreateCompany::route('/create'),
            'view' => ViewCompany::route('/{record}'),
            'edit' => EditCompany::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Access Management');
    }

    public static function getNavigationBadge(): ?string
    {
        return null;
        //return static::getEloquentQuery()->count();
    }

    public static function getModelLabel(): string
    {
        return __('Company');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Companies');
    }

    public static function getRecordTitle(?Model $record): string|Htmlable|null
    {
        return $record->name;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['ruc', 'name', 'email', 'legal_representative'];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return static::getEloquentQuery()->withoutTrashed();
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return static::getUrl('view', ['record' => $record]);
    }
}
