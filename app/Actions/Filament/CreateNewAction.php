<?php

namespace App\Actions\Filament;

use Filament\Actions\Action;

class CreateNewAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'create-new';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Create New'))
            ->color('primary')
            ->keyBindings(['F6'])
            ->disabledForm();
    }
}
