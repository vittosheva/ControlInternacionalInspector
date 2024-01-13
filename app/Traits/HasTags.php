<?php

namespace App\Traits;

use App\Models\Inventory\Tag;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\SpatieTagsColumn;
use Illuminate\Support\Collection;

trait HasTags
{
    public static function formTagsField(): SpatieTagsInput
    {
        return SpatieTagsInput::make('tags')->label(__('Tags'));
    }

    public static function tagsColumn(): SpatieTagsColumn
    {
        return SpatieTagsColumn::make('tags')->label(__('Tags'))->toggleable();
    }

    public static function changeTagsAction(): BulkAction
    {
        return BulkAction::make('change_tags')
            ->label(__('Change Labels'))
            ->action(function (Collection $records, array $data): void {
                foreach ($records as $record) {
                    $record->tags()->{$data['action']}($data['tags']);
                }
            })
            ->form([
                Grid::make()
                    ->schema([
                        Select::make('action')
                            ->label('For selected records')
                            ->options([
                                'attach' => 'add',
                                'detach' => 'remove',
                                'sync' => 'overwrite',
                            ])
                            ->default('sync')
                            ->required(),

                        self::tagsField(),

                    ])->columns(),
            ]);
    }

    public static function tagsField(): Select
    {
        return Select::make('tags')
            ->options(Tag::pluck('name', 'id'))
            ->multiple()
            ->searchable()
            ->createOptionForm([
                TextInput::make('name')
                    ->lazy()
                    ->afterStateUpdated(fn ($set, $state) => $set('name', ucfirst($state)))
                    ->required(),
            ]);
    }
}
