<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyUser extends Pivot
{
    public $incrementing = false;

    protected $connection = 'mysql';

    protected $fillable = [
        'user_id', 'company_id',
    ];
}
