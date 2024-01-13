<?php

namespace App\Models\Core;

use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    protected $connection = 'mysql';

    /*public function team(): BelongsTo
    {
        dd('Permission team');
        return $this->belongsTo(Company::class);
    }

    public function company(): BelongsTo
    {
        dd('Permission company');
        return $this->belongsTo(Company::class);
    }*/
}
