<?php

namespace App\Filament\SuperAdmin\Resources\EmployeeResource\RelationManagers;

use Illuminate\Database\Eloquent\Model;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager as BaseAuditsRelationManager;

class AuditsRelationManager extends BaseAuditsRelationManager
{
    public static function canViewForRecord(Model $ownerRecord, string $pageClass): bool
    {
        return auth()->user()->can('audit', $ownerRecord);
    }
}
