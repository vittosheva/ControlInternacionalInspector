<?php

namespace App\Models\Inspections;

use Illuminate\Database\Eloquent\Model;

class BathroomState extends Model
{
    protected $connection = 'control_prod';

    protected $table = 'bathrooms_states';
}
