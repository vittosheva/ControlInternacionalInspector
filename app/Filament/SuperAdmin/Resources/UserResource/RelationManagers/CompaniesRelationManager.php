<?php

namespace App\Filament\SuperAdmin\Resources\UserResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\DetachBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class CompaniesRelationManager extends RelationManager
{
    protected static string $relationship = 'companies';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('Companies');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('ruc')
                    ->label(__('RUC'))
                    ->required(),
                TextInput::make('email')
                    ->label(__('Email'))
                    ->email(),
                TextInput::make('legal_representative')
                    ->label(__('Legal Representative')),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),
                TextColumn::make('ruc')
                    ->label(__('RUC'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('Email'))
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                AttachAction::make()
                    ->preloadRecordSelect(false),
            ])
            ->actions([
                ViewAction::make(),
                DetachAction::make(),
            ])
            ->bulkActions([
                DetachBulkAction::make(),
            ])
            ->emptyStateActions([
                //
            ]);
    }
}
