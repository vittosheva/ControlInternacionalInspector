<?php

namespace App\Tables\Actions;

use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class IsAllowedToLoginBulkAction extends BulkAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Is Allowed To Login?'))
            ->icon('heroicon-o-arrows-right-left')
            ->action(fn (Collection $records) => $records->each(function (Model $record) {
                if (! isset($record->is_allowed_to_login)) {
                    return;
                }

                $record->is_allowed_to_login = ! $record->is_allowed_to_login;
                $record->save();
            }))
            ->requiresConfirmation()
            ->deselectRecordsAfterCompletion();
    }
}
