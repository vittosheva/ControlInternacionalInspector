<?php

namespace App\Filament\SuperAdmin\Resources;

use Althinect\FilamentSpatieRolesPermissions\Commands\Permission as BasePermission;
use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource as BasePermissionResource;
use App\Filament\SuperAdmin\Resources\PermissionResource\Pages\CreatePermission;
use App\Filament\SuperAdmin\Resources\PermissionResource\Pages\EditPermission;
use App\Filament\SuperAdmin\Resources\PermissionResource\Pages\ListPermissions;
use App\Filament\SuperAdmin\Resources\PermissionResource\RelationManager\RoleRelationManager;
use App\Forms\Components\RoleSelect;
use App\Models\Core\Permission;
use App\Models\Core\Role;
use Exception;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use ReflectionClass;

class PermissionResource extends BasePermissionResource
{
    protected static ?string $model = Permission::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Grid::make()->schema([
                            TextInput::make('name')
                                ->label(__('filament-spatie-roles-permissions::filament-spatie.field.name'))
                                ->required(),
                            Select::make('guard_name')
                                ->label(__('filament-spatie-roles-permissions::filament-spatie.field.guard_name'))
                                ->options(config('filament-spatie-roles-permissions.guard_names'))
                                ->default(config('filament-spatie-roles-permissions.default_guard_name'))
                                ->required(),
                            RoleSelect::make('roles')
                                ->multiple(),
                        ]),
                    ]),
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
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.name'))
                    ->searchable(),
                TextColumn::make('guard_name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.guard_name'))
                    ->toggleable(isToggledHiddenByDefault: config('filament-spatie-roles-permissions.toggleable_guard_names.permissions.isToggledHiddenByDefault', true))
                    ->searchable(),
                TextColumn::make('roles.name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.roles'))
                    ->searchable()
                    ->inline()
                    ->limitList(5),
            ])
            ->filters([
                Filter::make('models1')
                    ->label(__('Models'))
                    ->form(function () {
                        $commands = new BasePermission();

                        $excluded = array_map(function ($classes) {
                            return new ReflectionClass($classes);
                        }, config('filament-spatie-roles-permissions.generator.excluded_models'));

                        $models = array_diff($commands->getModels(), $excluded);

                        return [
                            Grid::make('models')
                                ->schema([
                                    Select::make('models')
                                        ->label(__('Models'))
                                        ->options(collect($models)->mapWithKeys(function (ReflectionClass $model) {
                                            return [$model->getShortName() => $model->getShortName()];
                                        })->toArray())
                                        ->multiple(),
                                ])
                                ->columns(3),
                        ];
                    })
                    ->query(function (Builder $query, array $data) {
                        return $query->where(function (Builder $query) use ($data) {
                            foreach ($data as $value) {
                                if (is_string($value)) {
                                    $query->orWhere('name', 'LIKE', '%'.$value[0]);
                                } elseif (is_array($value)) {
                                    foreach ($value as $model) {
                                        $query->orWhere('name', 'LIKE', '%'.$model);
                                    }
                                }
                            }
                        });
                    }),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
                BulkAction::make('attach_role')
                    ->label(__('Attach Role'))
                    ->form([
                        Select::make('roles')
                            ->label(__('filament-spatie-roles-permissions::filament-spatie.field.roles'))
                            ->prefixIcon('heroicon-m-finger-print')
                            ->options(Role::pluck('name', 'id'))
                            ->multiple()
                            ->searchable(),
                    ])
                    ->action(function (Collection $records, $data): void {
                        foreach ($records as $record) {
                            $record->roles()->sync($data['roles']);
                            $record->save();
                        }
                    })
                    ->deselectRecordsAfterCompletion(),
            ])
            ->selectCurrentPageOnly(false)
            ->emptyStateActions([
                CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RoleRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPermissions::route('/'),
            'create' => CreatePermission::route('/create'),
            'edit' => EditPermission::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderBy('name');
    }
}
