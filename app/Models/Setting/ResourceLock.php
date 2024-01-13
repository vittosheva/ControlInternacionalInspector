<?php

namespace App\Models\Setting;

use App\Models\Traits\CompanyTrait;
use Kenepa\ResourceLock\Models\ResourceLock as BaseResourceLock;

class ResourceLock extends BaseResourceLock
{
    use CompanyTrait;

    protected $connection = 'audit';
}
