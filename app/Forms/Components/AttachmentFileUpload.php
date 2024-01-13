<?php

namespace App\Forms\Components;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class AttachmentFileUpload extends SpatieMediaLibraryFileUpload
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Attachment Files'))
            ->disk('general_files')
            ->directory(fn () => filament()->getTenant()->getAttributeValue('ruc'))
            ->collection('item_files')
            ->moveFiles()
            ->multiple()
            ->openable()
            ->downloadable()
            ->reorderable()
            ->appendFiles()
            ->preserveFilenames(false)
            ->maxFiles(config('dorsi.images.attachments.amount'))
            ->maxSize(config('dorsi.images.attachments.size'));
    }
}
