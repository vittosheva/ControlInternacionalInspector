<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Picqer\Barcode\BarcodeGeneratorPNG;

class BarCodeImage extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Bar Code'))
            ->live(onBlur: true)
            ->hintActions([
                Action::make('deleteBarCode')
                    ->label(__('Delete'))
                    ->icon('heroicon-m-trash')
                    ->requiresConfirmation()
                    ->action(function ($state, Set $set) {
                        $set($this->getName(), null);
                        $set('bar_code_file', null);
                        $this->deleteFile($state);
                    })
                    ->hidden(fn (Get $get) => blank($get('bar_code_file'))),
            ])
            ->afterStateUpdated(function ($state, $old, Get $get, Set $set) {
                $set('bar_code_file', null);
                $this->deleteFile($old);

                if (blank($get($this->getName()))) {
                    return;
                }

                $generator = new BarcodeGeneratorPNG();
                $barCode = $generator->getBarcode($state, $generator::TYPE_CODE_128);

                $this->getStorage()->put($this->getFileName($state), $barCode);

                $set('bar_code_file', $this->getFile($state));
            })
            ->columnSpanFull();
    }

    protected function getStorage(): Filesystem|FilesystemAdapter
    {
        return Storage::disk('bar_codes');
    }

    protected function getFile($filename): string
    {
        return $this
            ->getStorage()
            ->url($this->getFileName($filename));
    }

    protected function getFileName($name): string
    {
        return filament()->getTenant()->getAttributeValue('ruc').'/'.$name.'.png';
    }

    protected function deleteFile($name): bool
    {
        return $this->getStorage()->delete($this->getFileName($name));
    }
}
