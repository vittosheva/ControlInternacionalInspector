<?php return array (
  'OwenIt\\Auditing\\AuditingEventServiceProvider' => 
  array (
    'OwenIt\\Auditing\\Events\\AuditCustom' => 
    array (
      0 => 'OwenIt\\Auditing\\Listeners\\RecordCustomAudit',
    ),
    'OwenIt\\Auditing\\Events\\DispatchAudit' => 
    array (
      0 => 'OwenIt\\Auditing\\Listeners\\ProcessDispatchAudit',
    ),
  ),
  'App\\Providers\\EventServiceProvider' => 
  array (
    'Illuminate\\Auth\\Events\\Login' => 
    array (
      0 => 'Rappasoft\\LaravelAuthenticationLog\\Listeners\\LoginListener',
    ),
    'Illuminate\\Auth\\Events\\Logout' => 
    array (
      0 => 'Rappasoft\\LaravelAuthenticationLog\\Listeners\\LogoutListener',
    ),
    'Illuminate\\Auth\\Events\\Failed' => 
    array (
      0 => 'Rappasoft\\LaravelAuthenticationLog\\Listeners\\FailedLoginListener',
    ),
    'Illuminate\\Auth\\Events\\OtherDeviceLogout' => 
    array (
      0 => 'Rappasoft\\LaravelAuthenticationLog\\Listeners\\OtherDeviceLogoutListener',
    ),
    'Illuminate\\Auth\\Events\\Lockout' => 
    array (
    ),
    'Illuminate\\Auth\\Events\\PasswordReset' => 
    array (
    ),
    'Illuminate\\Auth\\Events\\Registered' => 
    array (
    ),
    'Illuminate\\Auth\\Events\\Verified' => 
    array (
    ),
    'JulioMotol\\AuthTimeout\\Events\\AuthTimedOut' => 
    array (
      0 => 'App\\Listeners\\AuthTimedOutListener',
    ),
    'Illuminate\\Http\\Client\\Events\\ConnectionFailed' => 
    array (
      0 => 'App\\Listeners\\LogHttpConnectionFailed',
    ),
    'Illuminate\\Http\\Client\\ConnectionException' => 
    array (
      0 => 'App\\Listeners\\LogHttpConnectionException',
    ),
  ),
);