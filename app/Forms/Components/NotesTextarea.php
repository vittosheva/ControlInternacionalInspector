<?php

namespace App\Forms\Components;

use Filament\Forms\Components\RichEditor;

class NotesTextarea extends RichEditor
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Notes'))
            ->string()
            ->disableToolbarButtons([
                'attachFiles',
            ])
            ->maxLength(65535);
    }
}
