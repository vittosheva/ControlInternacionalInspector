<?php

namespace App\Actions\Filament;

use Filament\Actions\Action;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Optimus\Optimus;

class GeneratePdfAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'generatePdf';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Generate PDF'))
            ->icon('heroicon-s-document')
            ->outlined(false)
            ->color(Color::Slate)
            ->url(fn (Model $record, Optimus $optimus) => route('pdf.generate', [
                'record' => $optimus->encode($record->getAttributeValue('id')),
                'document' => $record->getAttributeValue('document_code'),
            ]).'?html',
                shouldOpenInNewTab: true
            );
    }
}
