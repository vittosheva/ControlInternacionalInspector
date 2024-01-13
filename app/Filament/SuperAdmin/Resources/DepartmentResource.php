<?php

namespace App\Filament\SuperAdmin\Resources;

use App\Filament\SuperAdmin\Resources\DepartmentResource\Pages\CreateDepartment;
use App\Filament\SuperAdmin\Resources\DepartmentResource\Pages\EditDepartment;
use App\Filament\SuperAdmin\Resources\DepartmentResource\Pages\ListDepartments;
use App\Filament\SuperAdmin\Resources\DepartmentResource\RelationManagers\SubDepartmentRelationManager;
use App\Models\Core\Department;
use App\Models\Scopes\IsActiveScope;
use App\Packages\Filament\ActionsTrait;
use App\Tables\Columns\CreatedAtColumn;
use App\Tables\Columns\CreatedByColumn;
use App\Tables\Filters\ManagerFilter;
use App\Tables\Grouping\IssueDateGroup;
use App\Tables\Grouping\ManagerGroup;
use Exception;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class DepartmentResource extends Resource
{
    use ActionsTrait;

    protected static ?string $model = Department::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General')
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Name'))
                            ->autofocus()
                            ->required()
                            ->maxLength(100),
                        Select::make('manager_id')
                            ->label(__('Manager'))
                            ->relationship('manager', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Group::make()
                            ->schema([
                                Select::make('parent_id')
                                    ->label(__('Parent Department'))
                                    ->relationship('parent', 'name')
                                    ->preload()
                                    ->searchable()
                                    ->nullable(),
                                Textarea::make('description')
                                    ->label(__('Description'))
                                    ->autosize()
                                    ->nullable(),
                            ])
                            ->columns(1),
                    ])->columns(),
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
                    ->weight('semibold')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('manager.name')
                    ->label(__('Manager'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('subDepartment_count')
                    ->label(__('Sub Departments'))
                    ->badge()
                    ->counts('subDepartment')
                    ->searchable()
                    ->sortable(),
                CreatedByColumn::make('creator.name'),
                CreatedAtColumn::make('created_at'),
            ])
            ->recordUrl(fn (Model $record) => EditDepartment::getUrl([$record->id]))
            ->filters([
                DateRangeFilter::make('created_at')
                    ->label(__('Created At')),
                ManagerFilter::make('manager_id'),
            ])
            ->actions([
                self::baseActions(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                BulkActionGroup::make([
                    ExportBulkAction::make(),
                ]),
            ])
            ->groups([
                ...$table->getGroups(),
                IssueDateGroup::make('created_at')
                    ->label(__('Created At')),
                ManagerGroup::make('manager_id'),
            ])
            ->defaultSort('id');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                IsActiveScope::class,
            ])
            ->orderBy('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDepartments::route('/'),
            'create' => CreateDepartment::route('/create'),
            'edit' => EditDepartment::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            SubDepartmentRelationManager::class,
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Department');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Departments');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Maintenances');
    }
}
