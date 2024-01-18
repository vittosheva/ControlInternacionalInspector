<?php

namespace App\Filament\SuperAdmin\Resources;

use App\Filament\SuperAdmin\Resources\UserResource\Pages\CreateUser;
use App\Filament\SuperAdmin\Resources\UserResource\Pages\EditUser;
use App\Filament\SuperAdmin\Resources\UserResource\Pages\ListUsers;
use App\Forms\Components\EmailTextInput;
use App\Forms\Components\IsActiveToggle;
use App\Forms\Components\IsAllowedToLoginToggle;
use App\Forms\Components\RoleSelect;
use App\Models\Persona\User;
use App\Models\Scopes\IsActiveScope;
use App\Tables\Columns\CreatedAtColumn;
use App\Tables\Columns\IsActiveColumn;
use Exception;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;
use Phpsa\FilamentPasswordReveal\Password;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make(__('Main Information'))
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Name'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('identification_number')
                            ->label(__('Identification Number'))
                            ->maxLength(13),
                        RoleSelect::make('roles')
                            ->columnSpan(null)
                            ->required(),
                        IsAllowedToLoginToggle::make('is_allowed_to_login')
                            ->inline(false)
                            ->visible(! auth()->user()->isSuperAdmin()),
                        IsActiveToggle::make('is_active')
                            ->inline(false),
                    ])->columns(3),

                Section::make(__('User Data'))
                    ->schema([
                        EmailTextInput::make('email')
                            ->columnSpan(null)
                            ->required(),
                        Password::make('password'),
                    ])
                    ->columns(),
            ]);
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
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('email')
                    ->label(__('Email'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('user_id')
                    ->label(__('User Id'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('identification_type')
                    ->label(__('Identification Type'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('identification_number')
                    ->label(__('Identification Number'))
                    ->searchable()
                    ->toggleable(),
                IsActiveColumn::make('is_active'),
                CreatedAtColumn::make('created_at'),
            ])
            ->filters([
                DateRangeFilter::make('created_at')->label(__('Created At'))->withIndicator(),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                CreateAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('roles')
            ->withoutGlobalScopes([
                IsActiveScope::class,
            ])
            ->where('is_super', '=', 0);
    }

    public static function getRelations(): array
    {
        return [
            AuditsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('User');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Users');
    }

    public static function getNavigationGroup(): ?string
    {
        return __(config('filament-spatie-roles-permissions.navigation_section_group', 'filament-spatie-roles-permissions::filament-spatie.section.roles_and_permissions'));
    }
}
