<?php

namespace App\Filament\Main\Resources\ControlResource\Pages;

use App\Filament\Main\Resources\ControlResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditControl extends EditRecord
{
    protected static string $resource = ControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //ViewAction::make(),
            DeleteAction::make()->visible(auth()->user()->isAdmin()),
        ];
    }
}
