<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeImage extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('QR Code'))
            ->live(onBlur: true)
            ->hintActions([
                Action::make('deleteQrCode')
                    ->label(__('Delete'))
                    ->icon('heroicon-m-trash')
                    ->requiresConfirmation()
                    ->action(function ($state, Set $set) {
                        $set($this->getName(), null);
                        $set('qr_code_file', null);
                        $this->deleteFile($state);
                    })
                    ->hidden(fn (Get $get) => blank($get('qr_code_file'))),
            ])
            ->afterStateUpdated(function ($state, $old, Get $get, Set $set) {
                $set('qr_code_file', null);
                $this->deleteFile($old);

                if (blank($get($this->getName()))) {
                    return;
                }

                $qrCode = QrCode::size(300)
                    ->margin(0)
                    ->generate($state);

                $this->getStorage()->put($this->getFileName($state), $qrCode);

                $set('qr_code_file', $this->getFile($state));
            })
            ->columnSpanFull();
    }

    protected function getStorage(): Filesystem|FilesystemAdapter
    {
        return Storage::disk('qr_codes');
    }

    protected function getFile($filename): string
    {
        return $this
            ->getStorage()
            ->url($this->getFileName($filename));
    }

    protected function getFileName($name): string
    {
        return filament()->getTenant()->getAttributeValue('ruc').'/'.$name.'.svg';
    }

    protected function deleteFile($name): bool
    {
        return $this->getStorage()->delete($this->getFileName($name));
    }
}
