<?php return array (
  'app' => 
  array (
    'name' => 'Control Internacional del Ecuador C.A.',
    'env' => 'production',
    'debug' => true,
    'url' => 'https://insp.controlinternacional.com',
    'asset_url' => NULL,
    'timezone' => 'America/Guayaquil',
    'locale' => 'es',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:u9aSeC2BHCR1QlX/ytp5P1W9cdIlXw49jSue6hSRuO8=',
    'cipher' => 'AES-256-CBC',
    'maintenance' => 
    array (
      'driver' => 'file',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      15 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      16 => 'Illuminate\\Queue\\QueueServiceProvider',
      17 => 'Illuminate\\Redis\\RedisServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\EventServiceProvider',
      25 => 'App\\Providers\\RouteServiceProvider',
      26 => 'App\\Providers\\DorsiSoftVendorOverrideServiceProvider',
      27 => 'App\\Providers\\SriWebserviceMacroProvider',
      28 => 'App\\Providers\\FilamentConfigureUsingProvider',
      29 => 'App\\Providers\\Filament\\MainPanelProvider',
      30 => 'App\\Providers\\Filament\\SuperAdminPanelProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
      'Optimus' => 'Cog\\Laravel\\Optimus\\Facades\\Optimus',
    ),
    'debug_hide' => 
    array (
      '_ENV' => 
      array (
        0 => 'APP_KEY',
        1 => 'DB_PASSWORD',
      ),
      '_SERVER' => 
      array (
        0 => 'APP_KEY',
        1 => 'DB_PASSWORD',
      ),
      '_POST' => 
      array (
        0 => 'password',
      ),
    ),
    'editor' => 'phpstorm',
  ),
  'audit' => 
  array (
    'enabled' => true,
    'implementation' => 'OwenIt\\Auditing\\Models\\Audit',
    'user' => 
    array (
      'morph_prefix' => 'user',
      'guards' => 
      array (
        0 => 'web',
        1 => 'api',
      ),
      'resolver' => 'OwenIt\\Auditing\\Resolvers\\UserResolver',
    ),
    'resolvers' => 
    array (
      'ip_address' => 'OwenIt\\Auditing\\Resolvers\\IpAddressResolver',
      'user_agent' => 'OwenIt\\Auditing\\Resolvers\\UserAgentResolver',
      'url' => 'OwenIt\\Auditing\\Resolvers\\UrlResolver',
    ),
    'events' => 
    array (
      0 => 'created',
      1 => 'updated',
      2 => 'deleted',
      3 => 'restored',
    ),
    'strict' => false,
    'exclude' => 
    array (
    ),
    'empty_values' => true,
    'allowed_empty_values' => 
    array (
      0 => 'retrieved',
    ),
    'timestamps' => false,
    'threshold' => 0,
    'driver' => 'database',
    'drivers' => 
    array (
      'database' => 
      array (
        'table' => 'audits',
        'connection' => 'audit',
      ),
    ),
    'queue' => 
    array (
      'enable' => false,
      'connection' => 'sync',
      'queue' => 'default',
      'delay' => 0,
    ),
    'console' => false,
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'superAdmin' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'customer' => 
      array (
        'driver' => 'session',
        'provider' => 'customers',
      ),
      'vendor' => 
      array (
        'driver' => 'session',
        'provider' => 'vendors',
      ),
      'carrier' => 
      array (
        'driver' => 'session',
        'provider' => 'carriers',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\Persona\\User',
      ),
      'customers' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\Persona\\Customer',
      ),
      'vendors' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\Persona\\Vendor',
      ),
      'carriers' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\Persona\\Carrier',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'auth-timeout' => 
  array (
    'session' => 'last_activity_time',
    'timeout' => '120',
    'event' => 'JulioMotol\\AuthTimeout\\Events\\AuthTimedOut',
  ),
  'authentication-log' => 
  array (
    'table_name' => 'authentication_log',
    'db_connection' => 'audit',
    'events' => 
    array (
      'login' => 'Illuminate\\Auth\\Events\\Login',
      'failed' => 'Illuminate\\Auth\\Events\\Failed',
      'logout' => 'Illuminate\\Auth\\Events\\Logout',
      'logout-other-devices' => 'Illuminate\\Auth\\Events\\OtherDeviceLogout',
    ),
    'notifications' => 
    array (
      'new-device' => 
      array (
        'enabled' => true,
        'location' => true,
        'template' => 'Rappasoft\\LaravelAuthenticationLog\\Notifications\\NewDevice',
      ),
      'failed-login' => 
      array (
        'enabled' => true,
        'location' => true,
        'template' => 'Rappasoft\\LaravelAuthenticationLog\\Notifications\\FailedLogin',
      ),
    ),
    'purge' => 365,
  ),
  'backup' => 
  array (
    'backup' => 
    array (
      'name' => 'Control Internacional del Ecuador C.A.',
      'source' => 
      array (
        'files' => 
        array (
          'include' => 
          array (
            0 => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector',
          ),
          'exclude' => 
          array (
            0 => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/vendor',
            1 => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/node_modules',
          ),
          'follow_links' => false,
          'ignore_unreadable_directories' => false,
          'relative_path' => NULL,
        ),
        'databases' => 
        array (
          0 => 'mysql',
        ),
      ),
      'database_dump_compressor' => NULL,
      'database_dump_file_extension' => '',
      'destination' => 
      array (
        'filename_prefix' => '',
        'disks' => 
        array (
          0 => 'local',
        ),
      ),
      'temporary_directory' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/app/backup-temp',
      'password' => 'Isa2108__',
      'encryption' => 'default',
      'tries' => 1,
      'retry_delay' => 0,
    ),
    'notifications' => 
    array (
      'notifications' => 
      array (
        'Spatie\\Backup\\Notifications\\Notifications\\BackupHasFailedNotification' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\UnhealthyBackupWasFoundNotification' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\CleanupHasFailedNotification' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\BackupWasSuccessfulNotification' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\HealthyBackupWasFoundNotification' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\CleanupWasSuccessfulNotification' => 
        array (
          0 => 'mail',
        ),
      ),
      'notifiable' => 'Spatie\\Backup\\Notifications\\Notifiable',
      'mail' => 
      array (
        'to' => 'vittosheva@gmail.com',
        'from' => 
        array (
          'address' => 'notificaciones@controlinternacional.com',
          'name' => 'Control Internacional del Ecuador C.A.',
        ),
      ),
      'slack' => 
      array (
        'webhook_url' => '',
        'channel' => NULL,
        'username' => NULL,
        'icon' => NULL,
      ),
      'discord' => 
      array (
        'webhook_url' => '',
        'username' => '',
        'avatar_url' => '',
      ),
    ),
    'monitor_backups' => 
    array (
      0 => 
      array (
        'name' => 'Control Internacional del Ecuador C.A.',
        'disks' => 
        array (
          0 => 'local',
        ),
        'health_checks' => 
        array (
          'Spatie\\Backup\\Tasks\\Monitor\\HealthChecks\\MaximumAgeInDays' => 1,
          'Spatie\\Backup\\Tasks\\Monitor\\HealthChecks\\MaximumStorageInMegabytes' => 5000,
        ),
      ),
    ),
    'cleanup' => 
    array (
      'strategy' => 'Spatie\\Backup\\Tasks\\Cleanup\\Strategies\\DefaultStrategy',
      'default_strategy' => 
      array (
        'keep_all_backups_for_days' => 7,
        'keep_daily_backups_for_days' => 16,
        'keep_weekly_backups_for_weeks' => 8,
        'keep_monthly_backups_for_months' => 4,
        'keep_yearly_backups_for_years' => 2,
        'delete_oldest_backups_when_using_more_megabytes_than' => 5000,
      ),
      'tries' => 1,
      'retry_delay' => 0,
    ),
  ),
  'backup-restore' => 
  array (
    'health-checks' => 
    array (
      0 => 'Wnx\\LaravelBackupRestore\\HealthChecks\\Checks\\DatabaseHasTables',
    ),
  ),
  'blade-lucide-icons' => 
  array (
    'prefix' => 'lucide',
    'fallback' => '',
    'class' => '',
    'attributes' => 
    array (
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'host' => 'api-mt1.pusher.com',
          'port' => '443',
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'array',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/framework/cache/data',
        'lock_path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'control_internacional_del_ecuador_ca_cache_',
  ),
  'coolsam-flatpickr' => 
  array (
    'default_theme' => 
    \Coolsam\FilamentFlatpickr\Enums\FlatpickrTheme::DEFAULT,
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'control_inspecciones_2024',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '23.145.120.242',
        'port' => '3306',
        'database' => 'control_inspecciones_2024',
        'username' => 'control_inspectores',
        'password' => '0PH#8H;fx}nH',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '23.145.120.242',
        'port' => '3306',
        'database' => 'control_inspecciones_2024',
        'username' => 'control_inspectores',
        'password' => '0PH#8H;fx}nH',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '23.145.120.242',
        'port' => '3306',
        'database' => 'control_inspecciones_2024',
        'username' => 'control_inspectores',
        'password' => '0PH#8H;fx}nH',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
      'pulse' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'forge',
        'username' => 'forge',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'audit' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '23.145.120.242',
        'port' => '3306',
        'database' => 'control_audits_2024',
        'username' => 'control_inspectores',
        'password' => '0PH#8H;fx}nH',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'control_prod' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '23.145.120.242',
        'port' => '3306',
        'database' => 'control_control_production',
        'username' => 'control_control',
        'password' => 'Xiiyx7oY%qI$',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'control_internacional_del_ecuador_ca_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'debugbar' => 
  array (
    'enabled' => false,
    'except' => 
    array (
      0 => 'telescope*',
      1 => 'horizon*',
    ),
    'storage' => 
    array (
      'enabled' => true,
      'open' => false,
      'driver' => 'file',
      'path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/debugbar',
      'connection' => NULL,
      'provider' => '',
      'hostname' => '127.0.0.1',
      'port' => 2304,
    ),
    'editor' => 'phpstorm',
    'remote_sites_path' => '',
    'local_sites_path' => '',
    'include_vendors' => true,
    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'ajax_handler_auto_show' => true,
    'error_handler' => false,
    'clockwork' => false,
    'collectors' => 
    array (
      'phpinfo' => true,
      'messages' => false,
      'time' => true,
      'memory' => true,
      'exceptions' => false,
      'log' => false,
      'db' => true,
      'views' => false,
      'route' => true,
      'auth' => false,
      'gate' => false,
      'session' => false,
      'symfony_request' => false,
      'mail' => true,
      'laravel' => false,
      'events' => false,
      'default_request' => false,
      'logs' => false,
      'files' => false,
      'config' => false,
      'cache' => false,
      'models' => true,
      'livewire' => true,
    ),
    'options' => 
    array (
      'auth' => 
      array (
        'show_name' => true,
      ),
      'db' => 
      array (
        'with_params' => true,
        'backtrace' => true,
        'backtrace_exclude_paths' => 
        array (
        ),
        'timeline' => false,
        'duration_background' => true,
        'explain' => 
        array (
          'enabled' => true,
          'types' => 
          array (
            0 => 'SELECT',
          ),
        ),
        'hints' => false,
        'show_copy' => false,
        'slow_threshold' => false,
      ),
      'mail' => 
      array (
        'full_log' => false,
      ),
      'views' => 
      array (
        'timeline' => false,
        'data' => false,
        'exclude_paths' => 
        array (
        ),
      ),
      'route' => 
      array (
        'label' => true,
      ),
      'logs' => 
      array (
        'file' => NULL,
      ),
      'cache' => 
      array (
        'values' => true,
      ),
    ),
    'inject' => true,
    'route_prefix' => '_debugbar',
    'route_middleware' => 
    array (
    ),
    'route_domain' => NULL,
    'theme' => 'auto',
    'debug_backtrace_limit' => 50,
  ),
  'dorsi' => 
  array (
    'project_name' => 'Control Internacional',
    'project_long_name' => 'Inspección - Control Internacional',
    'meta_description' => 'Control Internacional es el sistema de registro de inspecciones a estaciones de servicios.',
    'project_description' => '',
    'project_logo' => 'img/ci-logo.png',
    'project_favicon' => 'favicon.png',
    'project_email' => 'sender@dorsisoft.com',
    'project_email_noreply' => 'noreply@dorsisoft.com',
    'project_email_default' => 'default@dorsisoft.com',
    'project_email_support' => 'support@dorsisoft.com',
    'project_telephone' => '0991582148',
    'project_version' => '1.0.0',
    'project_theme_color' => 
    array (
      50 => '238, 242, 255',
      100 => '224, 231, 255',
      200 => '199, 210, 254',
      300 => '165, 180, 252',
      400 => '129, 140, 248',
      500 => '99, 102, 241',
      600 => '79, 70, 229',
      700 => '67, 56, 202',
      800 => '55, 48, 163',
      900 => '49, 46, 129',
      950 => '30, 27, 75',
    ),
    'project_background_color' => '#ffffff',
    'project_url_homepage' => 'https://insp.controlinternacional.com',
    'project_url_admin' => 'https://admin.controlinternacional.com',
    'filament' => 
    array (
      'spa' => false,
      'google_recaptcha' => false,
      'lock_timeout' => 15,
      'defer_loading' => false,
      'persists' => 
      array (
        'sort' => true,
        'filter' => true,
        'search' => true,
        'column_search' => true,
      ),
      'options' => 
      array (
        0 => 5,
        1 => 10,
        2 => 15,
        3 => 25,
        4 => 50,
      ),
      'default_option' => 15,
      'modules' => 
      array (
        'icon_size' => 16,
        'modal_heading' => 'Módulos',
        'modal_width' => 'screen',
        'slide_over' => false,
        'simple' => true,
        'excludes' => 
        array (
          0 => 'superAdmin',
        ),
        'permissions' => 
        array (
          0 => 'access Main',
        ),
        'labels' => 
        array (
          'main' => 'Principal',
        ),
        'icons' => 
        array (
          'main' => 'heroicon-o-cursor-arrow-ripple',
        ),
        'colors' => 
        array (
          'main' => 
          array (
            50 => '238, 242, 255',
            100 => '224, 231, 255',
            200 => '199, 210, 254',
            300 => '165, 180, 252',
            400 => '129, 140, 248',
            500 => '99, 102, 241',
            600 => '79, 70, 229',
            700 => '67, 56, 202',
            800 => '55, 48, 163',
            900 => '49, 46, 129',
            950 => '30, 27, 75',
          ),
        ),
      ),
    ),
    'images' => 
    array (
      'global' => 
      array (
        'amount' => 1,
        'size' => 500,
      ),
      'products' => 
      array (
        'amount' => 3,
        'size' => 1000,
      ),
      'services' => 
      array (
        'amount' => 3,
        'size' => 1000,
      ),
      'attachments' => 
      array (
        'amount' => 5,
        'size' => 1000,
      ),
    ),
    'passwords' => 
    array (
      'min_length' => 8,
      'number' => true,
      'letters' => true,
      'special_character' => true,
      'mixed_case' => true,
    ),
    'webservices_sri' => 
    array (
      'validar_comprobante' => 
      array (
        'pruebas' => 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantesOffline?wsdl',
        'produccion' => 'https://cel.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantesOffline?wsdl',
        'trace' => true,
      ),
      'autorizar_comprobante' => 
      array (
        'pruebas' => 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantesOffline?wsdl',
        'produccion' => 'https://cel.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantesOffline?wsdl',
        'trace' => true,
      ),
      'timeout' => 10000,
      'exception' => true,
      'soap_version' => 'SOAP_1_1',
      'cache' => 'WSDL_CACHE_NONE',
      'macro' => 
      array (
        'persona' => 
        array (
          'version' => 2.0,
          'debug' => false,
          'timeout' => 5,
          'retry' => 1,
        ),
      ),
    ),
    'resolutions' => 
    array (
      0 => 'NAC-DNCRASC20-00000001',
      1 => 'NAC-DGERCGC20-00000057',
    ),
    'invoice_max_total_allow_to_final_consumer' => 50,
    'figure_decimal_separator' => '.',
    'figure_thousand_separator' => '',
    'decimals_global' => 2,
    'decimals_quantity' => 4,
    'decimals_unit_price' => 6,
    'decimals_price' => 2,
    'decimals_discount' => 2,
    'decimals_base_imponible' => 2,
    'decimals_subtotal' => 2,
    'decimals_tax' => 2,
    'decimals_total' => 2,
    'decimals' => 
    array (
      'min' => 2,
      'max' => 6,
    ),
    'padLeft' => 9,
    'support_email' => 'soporte@dorsisoft.com',
    'support_phone_international' => '593991582148',
    'support_phone' => '0991582148',
    'developer' => 
    array (
      'name' => 'Vittorio Dormi',
      'email' => 'vittosheva@gmail.com',
    ),
  ),
  'eloquent-sortable' => 
  array (
    'order_column_name' => 'order_column',
    'sort_when_creating' => true,
    'ignore_timestamps' => false,
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'strict_null_comparison' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
        'output_encoding' => '',
        'test_auto_detect' => true,
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'ignore_empty' => false,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => NULL,
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'UTF-8',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
    ),
    'transactions' => 
    array (
      'handler' => 'db',
      'db' => 
      array (
        'connection' => NULL,
      ),
    ),
    'temporary_files' => 
    array (
      'local_path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/framework/cache/laravel-excel',
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
      'force_resync_remote' => NULL,
    ),
  ),
  'filament' => 
  array (
    'broadcasting' => 
    array (
    ),
    'default_filesystem_disk' => 'public',
    'assets_path' => NULL,
    'cache_path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/bootstrap/cache/filament',
    'livewire_loading_delay' => 'default',
  ),
  'filament-apex-charts' => 
  array (
    'chart_options' => 
    array (
      0 => 'Empty',
      1 => 'Area',
      2 => 'Bar',
      3 => 'Boxplot',
      4 => 'Bubble',
      5 => 'Candlestick',
      6 => 'Column',
      7 => 'Donut',
      8 => 'Heatmap',
      9 => 'Line',
      10 => 'Mixed-LineAndColumn',
      11 => 'Pie',
      12 => 'PolarArea',
      13 => 'Radar',
      14 => 'Radialbar',
      15 => 'RangeArea',
      16 => 'Scatter',
      17 => 'TimelineRangeBars',
      18 => 'Treemap',
    ),
  ),
  'filament-auditing' => 
  array (
    'audits_sort' => 
    array (
      'column' => 'created_at',
      'direction' => 'desc',
    ),
    'is_lazy' => true,
    'audits_extend' => 
    array (
    ),
  ),
  'filament-authentication-log' => 
  array (
    'resources' => 
    array (
      'AutenticationLogResource' => 'App\\Filament\\SuperAdmin\\Resources\\AuthenticationLogResource',
    ),
    'authenticable-resources' => 
    array (
      0 => 'App\\Models\\Persona\\User',
    ),
    'navigation' => 
    array (
      'authentication-log' => 
      array (
        'register' => true,
        'sort' => 2,
        'icon' => 'heroicon-o-shield-check',
      ),
    ),
    'sort' => 
    array (
      'column' => 'login_at',
      'direction' => 'desc',
    ),
  ),
  'filament-clear-cache' => 
  array (
    'default_commands' => 
    array (
      0 => 'icons:clear',
      1 => 'optimize:clear',
      2 => 'optimize',
      3 => 'event:cache',
      4 => 'view:cache',
      5 => 'icons:cache',
    ),
    'changes_count' => 'session_key',
    'livewireComponentClass' => 'CmsMulti\\FilamentClearCache\\Http\\Livewire\\ClearCache',
    'permissions' => false,
    'role' => false,
  ),
  'filament-export' => 
  array (
    'default_format' => 'xlsx',
    'time_format' => 'M_d_Y-H_i',
    'default_page_orientation' => 'portrait',
    'disable_additional_columns' => false,
    'disable_filter_columns' => false,
    'disable_file_name' => false,
    'disable_file_name_prefix' => false,
    'disable_preview' => false,
    'use_snappy' => false,
    'action_icon' => 'heroicon-o-arrow-down-on-square',
    'preview_icon' => 'heroicon-o-eye',
    'export_icon' => 'heroicon-o-arrow-down-on-square',
    'print_icon' => 'heroicon-o-printer',
    'cancel_icon' => 'heroicon-o-x-circle',
  ),
  'filament-locationpickr-field' => 
  array (
    'key' => '',
    'default_location' => 
    array (
      'lat' => 41.32836109345274,
      'lng' => 19.818383186960773,
    ),
    'default_zoom' => 8,
    'default_draggable' => true,
    'default_clickable' => true,
    'default_height' => '400px',
    'my_location_button' => 'Mi ubicación',
  ),
  'filament-lockscreen' => 
  array (
    'icon' => 'heroicon-s-lock-closed',
    'url' => '/screen/lock',
    'table_columns' => 
    array (
      'account_username_field' => 'email',
      'account_password_field' => 'password',
    ),
    'rate_limit' => 
    array (
      'enable_rate_limit' => true,
      'rate_limit_max_count' => 5,
      'force_logout' => false,
    ),
  ),
  'filament-spatie-roles-permissions' => 
  array (
    'preload_roles' => true,
    'preload_permissions' => true,
    'navigation_section_group' => 'filament-spatie-roles-permissions::filament-spatie.section.roles_and_permissions',
    'team_model' => 'App\\Models\\Core\\Company',
    'scope_to_tenant' => true,
    'should_register_on_navigation' => 
    array (
      'permissions' => true,
      'roles' => true,
    ),
    'guard_names' => 
    array (
      'web' => 'web',
    ),
    'toggleable_guard_names' => 
    array (
      'roles' => 
      array (
        'isToggledHiddenByDefault' => true,
      ),
      'permissions' => 
      array (
        'isToggledHiddenByDefault' => true,
      ),
    ),
    'default_guard_name' => NULL,
    'model_filter_key' => 'return \'%\'.$key;',
    'user_name_column' => 'name',
    'icons' => 
    array (
      'role_navigation' => 'heroicon-o-lock-closed',
      'permission_navigation' => 'heroicon-o-lock-closed',
    ),
    'sort' => 
    array (
      'role_navigation' => false,
      'permission_navigation' => false,
    ),
    'generator' => 
    array (
      'guard_names' => 
      array (
        0 => 'web',
      ),
      'permission_affixes' => 
      array (
        'viewAnyPermission' => 'view-any',
        'viewPermission' => 'view',
        'createPermission' => 'create',
        'updatePermission' => 'update',
        'deletePermission' => 'delete',
        0 => 'replicate',
        1 => 'reorder',
      ),
      'permission_name' => 'return $permissionAffix . \' \' . $modelName;',
      'discover_models_through_filament_resources' => false,
      'model_directories' => 
      array (
        0 => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/app/Models',
        1 => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/app/Models/Core',
        2 => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/app/Models/Inspections',
        3 => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/app/Models/Persona',
      ),
      'custom_models' => 
      array (
      ),
      'excluded_models' => 
      array (
        0 => 'App\\Models\\Common\\CategoryType',
        1 => 'App\\Models\\Common\\IdentificationType',
        2 => 'App\\Models\\Core\\CompanySetting',
        3 => 'App\\Models\\Core\\CompanyUser',
        4 => 'App\\Models\\Core\\Media',
        5 => 'App\\Models\\Locale\\City',
        6 => 'App\\Models\\Locale\\Country',
        7 => 'App\\Models\\Locale\\Currency',
        8 => 'App\\Models\\Locale\\State',
      ),
      'excluded_policy_models' => 
      array (
        0 => 'App\\Models\\Core\\Company',
        1 => 'App\\Models\\Core\\CompanySetting',
        2 => 'App\\Models\\Core\\CompanyUser',
        3 => 'App\\Models\\Core\\Department',
        4 => 'App\\Models\\Core\\Media',
        5 => 'App\\Models\\Persona\\Customer',
      ),
      'custom_permissions' => 
      array (
        0 => 'access Main',
        1 => 'consume Webservice',
      ),
      'user_model' => 'App\\Models\\Persona\\User',
      'policies_namespace' => 'App\\Policies',
    ),
  ),
  'filament-tiptap-editor' => 
  array (
    'direction' => 'ltr',
    'max_content_width' => '5xl',
    'disable_stylesheet' => false,
    'profiles' => 
    array (
      'default' => 
      array (
        0 => 'heading',
        1 => 'bullet-list',
        2 => 'ordered-list',
        3 => 'checked-list',
        4 => 'blockquote',
        5 => 'hr',
        6 => '|',
        7 => 'bold',
        8 => 'italic',
        9 => 'strike',
        10 => 'underline',
        11 => 'superscript',
        12 => 'subscript',
        13 => 'lead',
        14 => 'small',
        15 => 'color',
        16 => 'highlight',
        17 => 'align-left',
        18 => 'align-center',
        19 => 'align-right',
        20 => '|',
        21 => 'link',
        22 => 'oembed',
        23 => 'table',
        24 => 'grid',
        25 => 'details',
        26 => '|',
        27 => 'source',
      ),
      'simple' => 
      array (
        0 => 'heading',
        1 => 'hr',
        2 => 'bullet-list',
        3 => 'ordered-list',
        4 => 'checked-list',
        5 => '|',
        6 => 'bold',
        7 => 'italic',
        8 => 'lead',
        9 => 'small',
        10 => '|',
        11 => 'link',
        12 => 'media',
      ),
      'barebone' => 
      array (
        0 => 'bold',
        1 => 'italic',
        2 => 'link',
        3 => 'bullet-list',
        4 => 'ordered-list',
      ),
    ),
    'media_action' => 'FilamentTiptapEditor\\Actions\\MediaAction',
    'link_action' => 'FilamentTiptapEditor\\Actions\\LinkAction',
    'output' => 
    \FilamentTiptapEditor\Enums\TiptapOutput::Html,
    'accepted_file_types' => 
    array (
      0 => 'image/jpeg',
      1 => 'image/png',
      2 => 'image/webp',
      3 => 'image/svg+xml',
      4 => 'application/pdf',
    ),
    'disk' => 'public',
    'directory' => 'images',
    'visibility' => 'public',
    'preserve_file_names' => false,
    'max_file_size' => 2042,
    'image_resize_mode' => NULL,
    'image_crop_aspect_ratio' => NULL,
    'image_resize_target_width' => NULL,
    'image_resize_target_height' => NULL,
    'use_relative_paths' => true,
    'disable_floating_menus' => false,
    'disable_bubble_menus' => false,
    'disable_toolbar_menus' => false,
    'bubble_menu_tools' => 
    array (
      0 => 'bold',
      1 => 'italic',
      2 => 'strike',
      3 => 'underline',
      4 => 'superscript',
      5 => 'subscript',
      6 => 'lead',
      7 => 'small',
      8 => 'link',
    ),
    'floating_menu_tools' => 
    array (
      0 => 'media',
      1 => 'grid-builder',
      2 => 'details',
      3 => 'table',
      4 => 'oembed',
      5 => 'code-block',
      6 => 'blocks',
    ),
    'extensions_script' => NULL,
    'extensions_styles' => NULL,
    'extensions' => 
    array (
    ),
    'theme_builder' => 'mix',
    'theme_file' => NULL,
    'theme_folder' => 'build',
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/app',
        'throw' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/app/public',
        'url' => 'https://insp.controlinternacional.com/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
      ),
      'inspections_pdf' => 
      array (
        'driver' => 'local',
        'root' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/app/inspections',
        'url' => '/inspections/pdfs',
        'visibility' => 'public',
        'throw' => false,
      ),
      'gcs' => 
      array (
        'driver' => 'gcs',
        'key_file_path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/service-account-credentials.json',
        'key_file' => 
        array (
        ),
        'project_id' => '',
        'bucket' => '',
        'path_prefix' => '',
        'storage_api_uri' => NULL,
        'apiEndpoint' => NULL,
        'visibility' => 'public',
        'visibility_handler' => NULL,
        'metadata' => 
        array (
          'cacheControl' => 'public,max-age=86400',
        ),
      ),
    ),
    'links' => 
    array (
      '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/public/storage' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/app/public',
      '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/public/storage/inspections-pdf' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/app/inspections',
    ),
  ),
  'flare' => 
  array (
    'key' => NULL,
    'flare_middleware' => 
    array (
      0 => 'Spatie\\FlareClient\\FlareMiddleware\\RemoveRequestIp',
      1 => 'Spatie\\FlareClient\\FlareMiddleware\\AddGitInformation',
      2 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddNotifierName',
      3 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddEnvironmentInformation',
      4 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddExceptionInformation',
      5 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddDumps',
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddLogs' => 
      array (
        'maximum_number_of_collected_logs' => 200,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddQueries' => 
      array (
        'maximum_number_of_collected_queries' => 200,
        'report_query_bindings' => true,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddJobs' => 
      array (
        'max_chained_job_reporting_depth' => 5,
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestBodyFields' => 
      array (
        'censor_fields' => 
        array (
          0 => 'password',
          1 => 'password_confirmation',
        ),
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestHeaders' => 
      array (
        'headers' => 
        array (
          0 => 'API-KEY',
        ),
      ),
    ),
    'send_logs_as_events' => true,
  ),
  'geoip' => 
  array (
    'log_failures' => true,
    'include_currency' => true,
    'service' => 'ipapi',
    'services' => 
    array (
      'maxmind_database' => 
      array (
        'class' => 'Torann\\GeoIP\\Services\\MaxMindDatabase',
        'database_path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/app/geoip.mmdb',
        'update_url' => 'https://download.maxmind.com/app/geoip_download?edition_id=GeoLite2-City&license_key=&suffix=tar.gz',
        'locales' => 
        array (
          0 => 'en',
        ),
      ),
      'maxmind_api' => 
      array (
        'class' => 'Torann\\GeoIP\\Services\\MaxMindWebService',
        'user_id' => NULL,
        'license_key' => NULL,
        'locales' => 
        array (
          0 => 'en',
        ),
      ),
      'ipapi' => 
      array (
        'class' => 'Torann\\GeoIP\\Services\\IPApi',
        'secure' => true,
        'key' => NULL,
        'continent_path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/app/continents.json',
        'lang' => 'en',
      ),
      'ipgeolocation' => 
      array (
        'class' => 'Torann\\GeoIP\\Services\\IPGeoLocation',
        'secure' => true,
        'key' => NULL,
        'continent_path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/app/continents.json',
        'lang' => 'en',
      ),
      'ipdata' => 
      array (
        'class' => 'Torann\\GeoIP\\Services\\IPData',
        'key' => NULL,
        'secure' => true,
      ),
      'ipfinder' => 
      array (
        'class' => 'Torann\\GeoIP\\Services\\IPFinder',
        'key' => NULL,
        'secure' => true,
        'locales' => 
        array (
          0 => 'en',
        ),
      ),
    ),
    'cache' => 'all',
    'cache_tags' => 
    array (
      0 => 'torann-geoip-location',
    ),
    'cache_expires' => 30,
    'default_location' => 
    array (
      'ip' => '127.0.0.0',
      'iso_code' => 'US',
      'country' => 'United States',
      'city' => 'New Haven',
      'state' => 'CT',
      'state_name' => 'Connecticut',
      'postal_code' => '06510',
      'lat' => 41.31,
      'lon' => -72.92,
      'timezone' => 'America/New_York',
      'continent' => 'NA',
      'default' => true,
      'currency' => 'USD',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
    ),
  ),
  'ide-helper' => 
  array (
    'filename' => '_ide_helper.php',
    'models_filename' => '_ide_helper_models.php',
    'meta_filename' => '.phpstorm.meta.php',
    'include_fluent' => false,
    'include_factory_builders' => false,
    'write_model_magic_where' => true,
    'write_model_external_builder_methods' => true,
    'write_model_relation_count_properties' => true,
    'write_eloquent_model_mixins' => false,
    'include_helpers' => false,
    'helper_files' => 
    array (
      0 => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/vendor/laravel/framework/src/Illuminate/Support/helpers.php',
    ),
    'model_locations' => 
    array (
      0 => 'app',
    ),
    'ignored_models' => 
    array (
    ),
    'model_hooks' => 
    array (
    ),
    'extra' => 
    array (
      'Eloquent' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'Illuminate\\Database\\Query\\Builder',
      ),
      'Session' => 
      array (
        0 => 'Illuminate\\Session\\Store',
      ),
    ),
    'magic' => 
    array (
    ),
    'interfaces' => 
    array (
    ),
    'custom_db_types' => 
    array (
    ),
    'model_camel_case_properties' => false,
    'type_overrides' => 
    array (
      'integer' => 'int',
      'boolean' => 'bool',
    ),
    'include_class_docblocks' => false,
    'force_fqn' => false,
    'use_generics_annotations' => true,
    'additional_relation_types' => 
    array (
    ),
    'additional_relation_return_types' => 
    array (
    ),
    'post_migrate' => 
    array (
    ),
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'auto',
    'enable_share_button' => true,
    'register_commands' => false,
    'solution_providers' => 
    array (
      0 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\BadMethodCallSolutionProvider',
      1 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\MergeConflictSolutionProvider',
      2 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\UndefinedPropertySolutionProvider',
      3 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\IncorrectValetDbCredentialsSolutionProvider',
      4 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingAppKeySolutionProvider',
      5 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\DefaultDbNameSolutionProvider',
      6 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\TableNotFoundSolutionProvider',
      7 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingImportSolutionProvider',
      8 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\InvalidRouteActionSolutionProvider',
      9 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\ViewNotFoundSolutionProvider',
      10 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\RunningLaravelDuskInProductionProvider',
      11 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingColumnSolutionProvider',
      12 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UnknownValidationSolutionProvider',
      13 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingMixManifestSolutionProvider',
      14 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingViteManifestSolutionProvider',
      15 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingLivewireComponentSolutionProvider',
      16 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UndefinedViewVariableSolutionProvider',
      17 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\GenericLaravelExceptionSolutionProvider',
      18 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\OpenAiSolutionProvider',
      19 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\SailNetworkSolutionProvider',
    ),
    'ignored_solution_providers' => 
    array (
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
    'settings_file_path' => '',
    'recorders' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\Recorders\\DumpRecorder\\DumpRecorder',
      1 => 'Spatie\\LaravelIgnition\\Recorders\\JobRecorder\\JobRecorder',
      2 => 'Spatie\\LaravelIgnition\\Recorders\\LogRecorder\\LogRecorder',
      3 => 'Spatie\\LaravelIgnition\\Recorders\\QueryRecorder\\QueryRecorder',
    ),
    'open_ai_key' => NULL,
    'with_stack_frame_arguments' => true,
    'argument_reducers' => 
    array (
      0 => 'Spatie\\Backtrace\\Arguments\\Reducers\\BaseTypeArgumentReducer',
      1 => 'Spatie\\Backtrace\\Arguments\\Reducers\\ArrayArgumentReducer',
      2 => 'Spatie\\Backtrace\\Arguments\\Reducers\\StdClassArgumentReducer',
      3 => 'Spatie\\Backtrace\\Arguments\\Reducers\\EnumArgumentReducer',
      4 => 'Spatie\\Backtrace\\Arguments\\Reducers\\ClosureArgumentReducer',
      5 => 'Spatie\\Backtrace\\Arguments\\Reducers\\DateTimeArgumentReducer',
      6 => 'Spatie\\Backtrace\\Arguments\\Reducers\\DateTimeZoneArgumentReducer',
      7 => 'Spatie\\Backtrace\\Arguments\\Reducers\\SymphonyRequestArgumentReducer',
      8 => 'Spatie\\LaravelIgnition\\ArgumentReducers\\ModelArgumentReducer',
      9 => 'Spatie\\LaravelIgnition\\ArgumentReducers\\CollectionArgumentReducer',
      10 => 'Spatie\\Backtrace\\Arguments\\Reducers\\StringableArgumentReducer',
    ),
  ),
  'jobs' => 
  array (
    'resources' => 
    array (
      'jobs' => 
      array (
        'enabled' => true,
        'label' => 'Job',
        'plural_label' => 'Jobs',
        'navigation_group' => 'Gestor de Jobs',
        'navigation_icon' => 'heroicon-o-play',
        'navigation_sort' => 1,
        'navigation_count_badge' => true,
        'resource' => 'Moox\\Jobs\\Resources\\JobsResource',
      ),
      'jobs_waiting' => 
      array (
        'enabled' => true,
        'label' => 'Job waiting',
        'plural_label' => 'Jobs waiting',
        'navigation_group' => 'Gestor de Jobs',
        'navigation_icon' => 'heroicon-o-pause',
        'navigation_sort' => 2,
        'navigation_count_badge' => true,
        'resource' => 'Moox\\Jobs\\Resources\\JobsWaitingResource',
      ),
      'failed_jobs' => 
      array (
        'enabled' => true,
        'label' => 'Failed Job',
        'plural_label' => 'Failed Jobs',
        'navigation_group' => 'Gestor de Jobs',
        'navigation_icon' => 'heroicon-o-exclamation-triangle',
        'navigation_sort' => 3,
        'navigation_count_badge' => true,
        'resource' => 'Moox\\Jobs\\Resources\\JobsFailedResource',
      ),
      'job_batches' => 
      array (
        'enabled' => true,
        'label' => 'Job Batch',
        'plural_label' => 'Job Batches',
        'navigation_group' => 'Gestor de Jobs',
        'navigation_icon' => 'heroicon-o-inbox-stack',
        'navigation_sort' => 4,
        'navigation_count_badge' => true,
        'resource' => 'Moox\\Jobs\\Resources\\JobBatchesResource',
      ),
    ),
    'pruning' => 
    array (
      'enabled' => true,
      'retention_days' => 7,
    ),
  ),
  'livewire' => 
  array (
    'class_namespace' => 'App\\Livewire',
    'view_path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/resources/views/livewire',
    'layout' => 'components.layouts.app',
    'lazy_placeholder' => NULL,
    'temporary_file_upload' => 
    array (
      'disk' => NULL,
      'rules' => NULL,
      'directory' => NULL,
      'middleware' => NULL,
      'preview_mimes' => 
      array (
        0 => 'png',
        1 => 'gif',
        2 => 'bmp',
        3 => 'svg',
        4 => 'wav',
        5 => 'mp4',
        6 => 'mov',
        7 => 'avi',
        8 => 'wmv',
        9 => 'mp3',
        10 => 'm4a',
        11 => 'jpg',
        12 => 'jpeg',
        13 => 'mpga',
        14 => 'webp',
        15 => 'wma',
      ),
      'max_upload_time' => 5,
    ),
    'render_on_redirect' => false,
    'legacy_model_binding' => false,
    'inject_assets' => true,
    'navigate' => 
    array (
      'show_progress_bar' => true,
      'progress_bar_color' => '#2299dd',
    ),
    'inject_morph_markers' => false,
    'pagination_theme' => 'tailwind',
  ),
  'logging' => 
  array (
    'default' => 'daily',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/logs/laravel.log',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
        'facility' => 8,
        'replace_placeholders' => true,
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/logs/laravel.log',
      ),
      'db_slow_queries' => 
      array (
        'driver' => 'daily',
        'path' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/logs/db-slow-queries.log',
        'level' => 'debug',
        'days' => 7,
        'replace_placeholders' => true,
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'url' => NULL,
        'host' => 'smtp.googlemail.com',
        'port' => '465',
        'encryption' => 'ssl',
        'username' => 'vittosheva@gmail.com',
        'password' => 'rxvopfxnfvqhuaad',
        'timeout' => NULL,
        'local_domain' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => 'mail',
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
    ),
    'from' => 
    array (
      'address' => 'notificaciones@controlinternacional.com',
      'name' => 'Control Internacional del Ecuador C.A.',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/resources/views/vendor/mail',
      ),
    ),
  ),
  'media-library' => 
  array (
    'disk_name' => 'public',
    'max_file_size' => 10485760,
    'queue_connection_name' => 'database',
    'queue_name' => '',
    'queue_conversions_by_default' => true,
    'media_model' => 'App\\Models\\Core\\Media',
    'use_default_collection_serialization' => false,
    'temporary_upload_model' => 'Spatie\\MediaLibraryPro\\Models\\TemporaryUpload',
    'enable_temporary_uploads_session_affinity' => true,
    'generate_thumbnails_for_temporary_uploads' => true,
    'file_namer' => 'Spatie\\MediaLibrary\\Support\\FileNamer\\DefaultFileNamer',
    'path_generator' => 'Spatie\\MediaLibrary\\Support\\PathGenerator\\DefaultPathGenerator',
    'file_remover_class' => 'Spatie\\MediaLibrary\\Support\\FileRemover\\DefaultFileRemover',
    'custom_path_generators' => 
    array (
    ),
    'url_generator' => 'Spatie\\MediaLibrary\\Support\\UrlGenerator\\DefaultUrlGenerator',
    'moves_media_on_update' => false,
    'version_urls' => false,
    'image_optimizers' => 
    array (
      'Spatie\\ImageOptimizer\\Optimizers\\Jpegoptim' => 
      array (
        0 => '-m85',
        1 => '--force',
        2 => '--strip-all',
        3 => '--all-progressive',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Pngquant' => 
      array (
        0 => '--force',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Optipng' => 
      array (
        0 => '-i0',
        1 => '-o2',
        2 => '-quiet',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Svgo' => 
      array (
        0 => '--disable=cleanupIDs',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Gifsicle' => 
      array (
        0 => '-b',
        1 => '-O3',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Cwebp' => 
      array (
        0 => '-m 6',
        1 => '-pass 10',
        2 => '-mt',
        3 => '-q 90',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Avifenc' => 
      array (
        0 => '-a cq-level=23',
        1 => '-j all',
        2 => '--min 0',
        3 => '--max 63',
        4 => '--minalpha 0',
        5 => '--maxalpha 63',
        6 => '-a end-usage=q',
        7 => '-a tune=ssim',
      ),
    ),
    'image_generators' => 
    array (
      0 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Image',
      1 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Webp',
      2 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Avif',
      3 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Pdf',
      4 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Svg',
      5 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Video',
    ),
    'temporary_directory_path' => NULL,
    'image_driver' => 'gd',
    'ffmpeg_path' => '/usr/bin/ffmpeg',
    'ffprobe_path' => '/usr/bin/ffprobe',
    'jobs' => 
    array (
      'perform_conversions' => 'Spatie\\MediaLibrary\\Conversions\\Jobs\\PerformConversionsJob',
      'generate_responsive_images' => 'Spatie\\MediaLibrary\\ResponsiveImages\\Jobs\\GenerateResponsiveImagesJob',
    ),
    'media_downloader' => 'Spatie\\MediaLibrary\\Downloaders\\DefaultDownloader',
    'remote' => 
    array (
      'extra_headers' => 
      array (
        'CacheControl' => 'max-age=604800',
      ),
    ),
    'responsive_images' => 
    array (
      'width_calculator' => 'Spatie\\MediaLibrary\\ResponsiveImages\\WidthCalculator\\FileSizeOptimizedWidthCalculator',
      'use_tiny_placeholders' => true,
      'tiny_placeholder_generator' => 'Spatie\\MediaLibrary\\ResponsiveImages\\TinyPlaceholderGenerator\\Blurred',
    ),
    'enable_vapor_uploads' => false,
    'default_loading_attribute_value' => NULL,
    'prefix' => '',
  ),
  'octane' => 
  array (
    'server' => 'roadrunner',
    'https' => false,
    'listeners' => 
    array (
      'Laravel\\Octane\\Events\\WorkerStarting' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\EnsureUploadedFilesAreValid',
        1 => 'Laravel\\Octane\\Listeners\\EnsureUploadedFilesCanBeMoved',
      ),
      'Laravel\\Octane\\Events\\RequestReceived' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CreateConfigurationSandbox',
        1 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToAuthorizationGate',
        2 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToBroadcastManager',
        3 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseManager',
        4 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseSessionHandler',
        5 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToFilesystemManager',
        6 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToHttpKernel',
        7 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToMailManager',
        8 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToNotificationChannelManager',
        9 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToPipelineHub',
        10 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToCacheManager',
        11 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToSessionManager',
        12 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToQueueManager',
        13 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToRouter',
        14 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToValidationFactory',
        15 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToViewFactory',
        16 => 'Laravel\\Octane\\Listeners\\FlushDatabaseRecordModificationState',
        17 => 'Laravel\\Octane\\Listeners\\FlushDatabaseQueryLog',
        18 => 'Laravel\\Octane\\Listeners\\RefreshQueryDurationHandling',
        19 => 'Laravel\\Octane\\Listeners\\FlushLogContext',
        20 => 'Laravel\\Octane\\Listeners\\FlushArrayCache',
        21 => 'Laravel\\Octane\\Listeners\\FlushMonologState',
        22 => 'Laravel\\Octane\\Listeners\\FlushStrCache',
        23 => 'Laravel\\Octane\\Listeners\\FlushTranslatorCache',
        24 => 'Laravel\\Octane\\Listeners\\PrepareInertiaForNextOperation',
        25 => 'Laravel\\Octane\\Listeners\\PrepareLivewireForNextOperation',
        26 => 'Laravel\\Octane\\Listeners\\PrepareScoutForNextOperation',
        27 => 'Laravel\\Octane\\Listeners\\PrepareSocialiteForNextOperation',
        28 => 'Laravel\\Octane\\Listeners\\FlushLocaleState',
        29 => 'Laravel\\Octane\\Listeners\\FlushQueuedCookies',
        30 => 'Laravel\\Octane\\Listeners\\FlushSessionState',
        31 => 'Laravel\\Octane\\Listeners\\FlushAuthenticationState',
        32 => 'Laravel\\Octane\\Listeners\\EnforceRequestScheme',
        33 => 'Laravel\\Octane\\Listeners\\EnsureRequestServerPortMatchesScheme',
        34 => 'Laravel\\Octane\\Listeners\\GiveNewRequestInstanceToApplication',
        35 => 'Laravel\\Octane\\Listeners\\GiveNewRequestInstanceToPaginator',
      ),
      'Laravel\\Octane\\Events\\RequestHandled' => 
      array (
      ),
      'Laravel\\Octane\\Events\\RequestTerminated' => 
      array (
      ),
      'Laravel\\Octane\\Events\\TaskReceived' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CreateConfigurationSandbox',
        1 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToAuthorizationGate',
        2 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToBroadcastManager',
        3 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseManager',
        4 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseSessionHandler',
        5 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToFilesystemManager',
        6 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToHttpKernel',
        7 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToMailManager',
        8 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToNotificationChannelManager',
        9 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToPipelineHub',
        10 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToCacheManager',
        11 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToSessionManager',
        12 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToQueueManager',
        13 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToRouter',
        14 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToValidationFactory',
        15 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToViewFactory',
        16 => 'Laravel\\Octane\\Listeners\\FlushDatabaseRecordModificationState',
        17 => 'Laravel\\Octane\\Listeners\\FlushDatabaseQueryLog',
        18 => 'Laravel\\Octane\\Listeners\\RefreshQueryDurationHandling',
        19 => 'Laravel\\Octane\\Listeners\\FlushLogContext',
        20 => 'Laravel\\Octane\\Listeners\\FlushArrayCache',
        21 => 'Laravel\\Octane\\Listeners\\FlushMonologState',
        22 => 'Laravel\\Octane\\Listeners\\FlushStrCache',
        23 => 'Laravel\\Octane\\Listeners\\FlushTranslatorCache',
        24 => 'Laravel\\Octane\\Listeners\\PrepareInertiaForNextOperation',
        25 => 'Laravel\\Octane\\Listeners\\PrepareLivewireForNextOperation',
        26 => 'Laravel\\Octane\\Listeners\\PrepareScoutForNextOperation',
        27 => 'Laravel\\Octane\\Listeners\\PrepareSocialiteForNextOperation',
      ),
      'Laravel\\Octane\\Events\\TaskTerminated' => 
      array (
      ),
      'Laravel\\Octane\\Events\\TickReceived' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CreateConfigurationSandbox',
        1 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToAuthorizationGate',
        2 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToBroadcastManager',
        3 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseManager',
        4 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseSessionHandler',
        5 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToFilesystemManager',
        6 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToHttpKernel',
        7 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToMailManager',
        8 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToNotificationChannelManager',
        9 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToPipelineHub',
        10 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToCacheManager',
        11 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToSessionManager',
        12 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToQueueManager',
        13 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToRouter',
        14 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToValidationFactory',
        15 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToViewFactory',
        16 => 'Laravel\\Octane\\Listeners\\FlushDatabaseRecordModificationState',
        17 => 'Laravel\\Octane\\Listeners\\FlushDatabaseQueryLog',
        18 => 'Laravel\\Octane\\Listeners\\RefreshQueryDurationHandling',
        19 => 'Laravel\\Octane\\Listeners\\FlushLogContext',
        20 => 'Laravel\\Octane\\Listeners\\FlushArrayCache',
        21 => 'Laravel\\Octane\\Listeners\\FlushMonologState',
        22 => 'Laravel\\Octane\\Listeners\\FlushStrCache',
        23 => 'Laravel\\Octane\\Listeners\\FlushTranslatorCache',
        24 => 'Laravel\\Octane\\Listeners\\PrepareInertiaForNextOperation',
        25 => 'Laravel\\Octane\\Listeners\\PrepareLivewireForNextOperation',
        26 => 'Laravel\\Octane\\Listeners\\PrepareScoutForNextOperation',
        27 => 'Laravel\\Octane\\Listeners\\PrepareSocialiteForNextOperation',
      ),
      'Laravel\\Octane\\Events\\TickTerminated' => 
      array (
      ),
      'Laravel\\Octane\\Contracts\\OperationTerminated' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\FlushTemporaryContainerInstances',
      ),
      'Laravel\\Octane\\Events\\WorkerErrorOccurred' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\ReportException',
        1 => 'Laravel\\Octane\\Listeners\\StopWorkerIfNecessary',
      ),
      'Laravel\\Octane\\Events\\WorkerStopping' => 
      array (
      ),
    ),
    'warm' => 
    array (
      0 => 'auth',
      1 => 'cache',
      2 => 'cache.store',
      3 => 'config',
      4 => 'cookie',
      5 => 'db',
      6 => 'db.factory',
      7 => 'db.transactions',
      8 => 'encrypter',
      9 => 'files',
      10 => 'hash',
      11 => 'log',
      12 => 'router',
      13 => 'routes',
      14 => 'session',
      15 => 'session.store',
      16 => 'translator',
      17 => 'url',
      18 => 'view',
    ),
    'flush' => 
    array (
    ),
    'tables' => 
    array (
      'example:1000' => 
      array (
        'name' => 'string:1000',
        'votes' => 'int',
      ),
    ),
    'cache' => 
    array (
      'rows' => 1000,
      'bytes' => 10000,
    ),
    'watch' => 
    array (
      0 => 'app',
      1 => 'bootstrap',
      2 => 'config',
      3 => 'database',
      4 => 'public/**/*.php',
      5 => 'resources/**/*.php',
      6 => 'routes',
      7 => 'composer.lock',
      8 => '.env',
    ),
    'garbage' => 50,
    'max_execution_time' => 30,
  ),
  'optimus' => 
  array (
    'default' => 'main',
    'connections' => 
    array (
      'main' => 
      array (
        'prime' => '1985665589',
        'inverse' => '180955165',
        'random' => '1118156102',
      ),
      'alternative' => 
      array (
        'prime' => 'your-prime-integer',
        'inverse' => 'your-inverse-integer',
        'random' => 'your-random-integer',
      ),
    ),
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'role_pivot_key' => NULL,
      'permission_pivot_key' => NULL,
      'model_morph_key' => 'model_id',
      'team_foreign_key' => 'team_id',
    ),
    'register_permission_check_method' => true,
    'register_octane_reset_listener' => false,
    'teams' => false,
    'use_passport_client_credentials' => false,
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      \DateInterval::__set_state(array(
         'from_string' => true,
         'date_string' => '24 hours',
      )),
      'key' => 'spatie.permission.cache',
      'store' => 'default',
    ),
  ),
  'queue' => 
  array (
    'default' => 'database',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'batching' => 
    array (
      'database' => 'mysql',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'resource-lock' => 
  array (
    'models' => 
    array (
      'User' => 'App\\Models\\Persona\\User',
      'ResourceLock' => 'App\\Models\\Setting\\ResourceLock',
    ),
    'unlocker' => 
    array (
      'limited_access' => true,
      'gate' => 'unlock Resource',
    ),
    'lock_notice' => 
    array (
      'display_resource_lock_owner' => true,
    ),
    'manager' => 
    array (
      'navigation_badge' => false,
      'navigation_label' => 'Bloqueos',
      'plural_label' => 'Administrador de bloqueos',
      'navigation_group' => 'Sistema',
      'navigation_sort' => 10,
      'limited_access' => true,
      'gate' => 'unlock Panel',
    ),
    'lock_timeout' => 15,
    'check_locks_before_saving' => true,
    'actions' => 
    array (
      'get_resource_lock_owner_action' => 'Kenepa\\ResourceLock\\Actions\\GetResourceLockOwnerAction',
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => 'insp.controlinternacional.com',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'verify_csrf_token' => 'App\\Http\\Middleware\\VerifyCsrfToken',
      'encrypt_cookies' => 'App\\Http\\Middleware\\EncryptCookies',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
      'scheme' => 'https',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'whatsapp' => 
    array (
      'from-phone-number-id' => NULL,
      'token' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => true,
    'files' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'control_internacional_del_ecuador_ca_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
  ),
  'tags' => 
  array (
    'slugger' => NULL,
    'tag_model' => 'App\\Models\\Inventory\\Tag',
    'taggable' => 
    array (
      'table_name' => 'taggables',
      'morph_name' => 'taggable',
      'class_name' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphPivot',
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/resources/views',
    ),
    'compiled' => '/Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/storage/framework/views',
  ),
  'blade-heroicons' => 
  array (
    'prefix' => 'heroicon',
    'fallback' => '',
    'class' => '',
    'attributes' => 
    array (
    ),
  ),
  'blade-icons' => 
  array (
    'sets' => 
    array (
    ),
    'class' => '',
    'attributes' => 
    array (
    ),
    'fallback' => '',
    'components' => 
    array (
      'disabled' => false,
      'default' => 'icon',
    ),
  ),
  'filament-jsoneditor' => 
  array (
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
