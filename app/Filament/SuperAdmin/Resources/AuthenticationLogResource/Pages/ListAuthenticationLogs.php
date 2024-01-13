<?php

namespace App\Filament\SuperAdmin\Resources\AuthenticationLogResource\Pages;

use App\Filament\SuperAdmin\Resources\AuthenticationLogResource;
use Filament\Resources\Pages\ListRecords;

class ListAuthenticationLogs extends ListRecords
{
    protected static string $resource = AuthenticationLogResource::class;
}
