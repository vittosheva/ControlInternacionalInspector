<?php

namespace App\Models\Core;

use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    protected $connection = 'mysql';

    /*public function team(): BelongsTo
    {
        dd('Role team');
        return $this->belongsTo(Company::class);
    }

    public function company(): BelongsTo
    {
        dd('Role company');
        return $this->belongsTo(Company::class);
    }*/
}
