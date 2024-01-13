<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;

class TitlePlaceholder extends Placeholder
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->content(new HtmlString(''))
            ->extraAttributes(['class' => '!text-xl font-bold border-b !pb-1.5'])
            ->columnSpanFull();
    }
}
