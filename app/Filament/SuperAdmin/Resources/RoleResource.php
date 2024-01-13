<?php

namespace App\Filament\SuperAdmin\Resources;

use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource as BaseRoleResource;
use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource\RelationManager\PermissionRelationManager;
use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource\RelationManager\UserRelationManager;
use App\Filament\SuperAdmin\Resources\RoleResource\Pages\CreateRole;
use App\Filament\SuperAdmin\Resources\RoleResource\Pages\EditRole;
use App\Filament\SuperAdmin\Resources\RoleResource\Pages\ListRoles;
use App\Models\Core\Company;
use App\Models\Core\Role;
use App\Models\Scopes\WithoutSuperAdminRoleScope;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class RoleResource extends BaseRoleResource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-finger-print';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Grid::make()
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.name'))
                                    ->required(),
                                TextInput::make('description')
                                    ->label(__('Description')),
                                Select::make('guard_name')
                                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.guard_name'))
                                    ->options(config('filament-spatie-roles-permissions.guard_names'))
                                    ->default(config('filament-spatie-roles-permissions.default_guard_name'))
                                    ->required(),
                                Select::make('permissions')
                                    ->multiple()
                                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.permissions'))
                                    ->relationship('permissions', 'virtual_name_guard_name', fn (Builder $query) => $query->select(['id', 'virtual_name_guard_name']))
                                    ->preload(config('filament-spatie-roles-permissions.preload_permissions')),
                                Select::make(config('permission.column_names.team_foreign_key', 'team_id'))
                                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.team'))
                                    ->hidden(! config('permission.teams', false))
                                    ->options(
                                        fn () => config('filament-spatie-roles-permissions.team_model', Company::class)::pluck('name', 'id')
                                    )
                                    ->dehydrated(fn ($state) => (int) $state <= 0)
                                    ->placeholder(__('filament-spatie-roles-permissions::filament-spatie.select-team'))
                                    ->hint(__('filament-spatie-roles-permissions::filament-spatie.select-team-hint')),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.name'))
                    ->searchable(),
                TextColumn::make('description')
                    ->label(__('Description'))
                    ->searchable(),
                TextColumn::make('guard_name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.guard_name'))
                    ->toggleable(isToggledHiddenByDefault: config('filament-spatie-roles-permissions.toggleable_guard_names.roles.isToggledHiddenByDefault', true))
                    ->searchable(),
            ])
            ->filters([
                //
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
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query
                    ->withGlobalScope('no_super_admin', new WithoutSuperAdminRoleScope())
                    ->orderBy('name');
            });
    }

    public static function getRelations(): array
    {
        return [
            PermissionRelationManager::class,
            UserRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }
}
