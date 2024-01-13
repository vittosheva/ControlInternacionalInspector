<?php

namespace App\Tables\Actions;

use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class IsActiveBulkAction extends BulkAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Is Active?'))
            ->icon('heroicon-o-arrows-right-left')
            ->action(fn (Collection $records) => $records->each(function (Model $record) {
                if (! isset($record->is_active)) {
                    return;
                }

                $record->is_active = ! $record->is_active;
                $record->save();
            }))
            ->requiresConfirmation()
            ->deselectRecordsAfterCompletion();
    }
}
