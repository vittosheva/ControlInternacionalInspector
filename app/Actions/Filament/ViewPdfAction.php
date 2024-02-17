<?php

namespace App\Actions\Filament;

use Filament\Actions\Action;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Optimus\Optimus;

class ViewPdfAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'viewPdf';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('View PDF'))
            ->icon('heroicon-m-document-text')
            ->outlined(false)
            ->color(Color::Sky)
            ->url(fn (Model $record, Optimus $optimus) => route('pdf.view', [
                'record' => $optimus->encode($record->getAttributeValue('id')),
            ]),
                shouldOpenInNewTab: true
            )
            ->visible(fn ($record) => ! empty($record->inspection_report_pdf) && Storage::disk('inspections_pdf')->exists($record->inspection_report_pdf));
    }
}
