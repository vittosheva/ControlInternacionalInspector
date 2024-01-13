<?php

namespace App\Packages\Filament;

use App\Tables\Actions\GeneratePdfBulkAction;
use Filament\Tables\Actions\DeleteBulkAction;

trait BulkActionsTrait
{
    public static function baseBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }

    public static function documentBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
            GeneratePdfBulkAction::make(),
        ];
    }
}
