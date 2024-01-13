<?php

namespace App\Filament\SuperAdmin\Resources\DepartmentResource\RelationManagers;

use App\Packages\Filament\ActionsTrait;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\AssociateAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SubDepartmentRelationManager extends RelationManager
{
    use ActionsTrait;

    protected static string $relationship = 'subDepartment';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Form $form): Form
    {
        return $form
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
                Textarea::make('description')
                    ->label(__('Description'))
                    ->autosize()
                    ->nullable(),
            ])
            ->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->modelLabel(__('Sub Department'))
            ->inverseRelationship('parent')
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
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make()
                    ->preloadRecordSelect()
                    ->recordSelectOptionsQuery(function (Builder $query) {
                        $existingSubDepartment = $this->getRelationship()->pluck('id')->toArray();

                        return $query
                            ->whereNotIn('id', $existingSubDepartment)
                            ->whereNotNull('parent_id');
                    }),
            ])
            ->actions([
                self::baseActions(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
