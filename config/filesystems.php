<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

        /*
         * Images
         */
        'logo_images' => [
            'driver' => 'local',
            'root' => storage_path('app/public/logos'),
            'url' => env('APP_URL').'/storage/logos',
            'visibility' => 'private',
            'throw' => false,
        ],

        'avatar_images' => [
            'driver' => 'local',
            'root' => storage_path('app/public/avatars'),
            'url' => env('APP_URL').'/storage/avatars',
            'visibility' => 'private',
            'throw' => false,
        ],

        'item_images' => [
            'driver' => 'local',
            'root' => storage_path('app/public/items'),
            'url' => env('APP_URL').'/storage/items',
            'visibility' => 'public',
            'throw' => false,
        ],

        'bar_codes' => [
            'driver' => 'local',
            'root' => storage_path('app/public/bar_codes'),
            'url' => env('APP_URL').'/storage/bar_codes',
            'visibility' => 'public',
            'throw' => false,
        ],

        'qr_codes' => [
            'driver' => 'local',
            'root' => storage_path('app/public/qr_codes'),
            'url' => env('APP_URL').'/storage/qr_codes',
            'visibility' => 'public',
            'throw' => false,
        ],

        /*
         * Files
         */
        'general_files' => [
            'driver' => 'local',
            'root' => storage_path('app/public/files'),
            'url' => env('APP_URL').'/storage/files',
            'visibility' => 'private',
            'throw' => false,
        ],
        'electronic_signature' => [
            'driver' => 'local',
            'root' => storage_path('app/electronic_signatures'),
            'url' => env('APP_URL').'/storage/electronic_signatures',
            'visibility' => 'private',
            'throw' => false,
        ],

        /*
         * SRI statuses
         */
        'xmls_creados' => [
            'driver' => 'local',
            'root' => storage_path('app/comprobantes/xmls/creados'),
            'url' => env('APP_URL').'/storage/comprobantes/xmls/creados',
            'visibility' => 'private',
            'throw' => false,
        ],
        'xmls_firmados' => [
            'driver' => 'local',
            'root' => storage_path('app/comprobantes/xmls/firmados'),
            'url' => env('APP_URL').'/storage/comprobantes/xmls/firmados',
            'visibility' => 'private',
            'throw' => false,
        ],
        'xmls_enviados_sri' => [
            'driver' => 'local',
            'root' => storage_path('app/comprobantes/xmls/enviados'),
            'url' => env('APP_URL').'/storage/comprobantes/xmls/enviados',
            'visibility' => 'private',
            'throw' => false,
        ],
        'xmls_rechazados_sri' => [
            'driver' => 'local',
            'root' => storage_path('app/comprobantes/xmls/rechazados'),
            'url' => env('APP_URL').'/storage/comprobantes/xmls/rechazados',
            'visibility' => 'private',
            'throw' => false,
        ],
        'xmls_no_autorizados' => [
            'driver' => 'local',
            'root' => storage_path('app/comprobantes/xmls/no-autorizados'),
            'url' => env('APP_URL').'/storage/comprobantes/xmls/no-autorizados',
            'visibility' => 'private',
            'throw' => false,
        ],
        'xmls_autorizados' => [
            'driver' => 'local',
            'root' => storage_path('app/comprobantes/xmls/autorizados'),
            'url' => env('ASSET_URL').'/storage/comprobantes/xmls/autorizados',
            'visibility' => 'public',
            'throw' => false,
        ],
        'pdfs' => [
            'driver' => 'local',
            'root' => storage_path('app/comprobantes/pdfs'),
            'url' => env('ASSET_URL').'/storage/comprobantes/pdfs',
            'visibility' => 'public',
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('storage/pdfs') => storage_path('app/comprobantes/pdfs'),
        public_path('storage/xmls') => storage_path('app/comprobantes/xmls/autorizados'),
        /*public_path('storage/logos') => storage_path('app/public/logos'),
        public_path('storage/items') => storage_path('app/public/items'),
        public_path('storage/bar_codes') => storage_path('app/public/bar_codes'),
        public_path('storage/qr_codes') => storage_path('app/public/qr_codes'),*/
    ],

];
