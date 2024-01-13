<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class DocumentNumberColumn extends TextColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Document Number'))
            ->alignCenter()
            ->tooltip(fn ($state) => ! empty($state) ? __('Click to copy') : null)
            ->copyable(fn ($state) => $state)
            ->copyMessage(__('Document Number copied'))
            ->copyMessageDuration(1500)
            ->sortable()
            ->toggleable();
    }
}
