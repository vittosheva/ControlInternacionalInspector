<?php

namespace App\Actions\Filament;

use Filament\Actions\ActionGroup;
use Filament\Support\Enums\IconSize;

class PdfGroupAction extends ActionGroup
{
    public static function getDefaultName(): ?string
    {
        return 'pdf';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('PDF'))
            ->icon('lucide-file-text')
            ->iconSize(IconSize::Small)
            ->tooltip(__('PDF'))
            ->extraAttributes(['class' => 'hide-text'])
            ->button();
    }
}
