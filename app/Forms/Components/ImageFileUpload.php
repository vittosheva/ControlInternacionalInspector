<?php

namespace App\Forms\Components;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ImageFileUpload extends SpatieMediaLibraryFileUpload
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Images'))
            ->disk('item_images')
            ->directory(fn () => filament()->getTenant()->getAttributeValue('ruc'))
            ->collection('item_images')
            ->conversion('thumb')
            ->moveFiles()
            ->image()
            ->imageEditor()
            ->multiple()
            ->openable()
            ->downloadable()
            ->reorderable()
            ->appendFiles()
            ->preserveFilenames(false)
            ->maxFiles(config('dorsi.images.global.amount'))
            ->maxSize(config('dorsi.images.global.size'));
    }
}
