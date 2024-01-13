<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class ImageColumn extends SpatieMediaLibraryImageColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Images'))
            ->collection('item_images')
            ->conversion('thumb')
            ->disk('item_images')
            ->circular()
            ->stacked()
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
