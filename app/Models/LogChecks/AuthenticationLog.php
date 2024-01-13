<?php

namespace App\Models\LogChecks;

use Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog as BaseAuthenticationLog;

class AuthenticationLog extends BaseAuthenticationLog
{
    protected $connection = 'audit';
}
