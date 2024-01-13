<?php

namespace App\Actions\Filament;

use Filament\Actions\Action;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconSize;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Optimus\Optimus;

class PrintAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'print';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Print'))
            ->icon('lucide-printer')
            ->iconSize(IconSize::Small)
            ->tooltip(__('Print'))
            ->extraAttributes(['class' => 'hide-text'])
            ->color(Color::Green)->url(fn (Model $record, Optimus $optimus) => route('pdf.generate', [
                'record' => $optimus->encode($record->getAttributeValue('id')),
                'document' => $record->getAttributeValue('document_code'),
            ]),
                shouldOpenInNewTab: true
            );
    }
}
