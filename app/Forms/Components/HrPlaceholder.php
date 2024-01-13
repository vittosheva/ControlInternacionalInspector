<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;

class HrPlaceholder extends Placeholder
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->content(new HtmlString('<hr>'))
            ->columnSpanFull();
    }
}
