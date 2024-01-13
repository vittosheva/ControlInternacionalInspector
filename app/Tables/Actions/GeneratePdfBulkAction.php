<?php

namespace App\Tables\Actions;

use App\Http\Controllers\Pdf\GenerateController;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Optimus\Optimus;

class GeneratePdfBulkAction extends BulkAction
{
    public static function getDefaultName(): ?string
    {
        return 'bulkGeneratePdf';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Massive PDF Generation'))
            ->icon('heroicon-s-document')
            ->outlined(false)
            ->color(Color::Slate)
            ->action(function (Collection $records, GenerateController $generateController, Optimus $optimus) {
                $records->each(function (Model $record) use ($generateController, $optimus) {
                    $generateController->handle(
                        $optimus->encode($record->getAttributeValue('id')),
                        $record->getAttributeValue('document_code'),
                        stream: false
                    );
                });

                Notification::make()
                    ->title(__('All documents has been generated to PDF'))
                    ->success()
                    ->send();
            })
            ->requiresConfirmation()
            ->deselectRecordsAfterCompletion();
    }
}
