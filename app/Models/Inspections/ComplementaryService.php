<?php

namespace App\Models\Inspections;

use Illuminate\Database\Eloquent\Model;

class ComplementaryService extends Model
{
    protected $connection = 'control_prod';

    protected $table = 'complementary_services';
}
