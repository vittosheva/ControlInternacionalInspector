<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class ImageFile extends Field
{
    protected string $view = 'forms.components.image-file';

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label('')
            ->columnSpanFull();
    }
}
