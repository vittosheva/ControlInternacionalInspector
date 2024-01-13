<?php

namespace App\Actions\Filament;

use Filament\Actions\Action;
use Filament\Support\Colors\Color;

class RegisterCollectionAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'registerCollection';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Register Collection'))
            ->color(Color::Pink)
            ->url('#');
    }
}
