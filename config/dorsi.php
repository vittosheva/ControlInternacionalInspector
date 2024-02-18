<?php

use Filament\Support\Colors\Color;

return [
    /*
    |--------------------------------------------------------------------------
    | Project Settings
    |--------------------------------------------------------------------------
    */
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
    'project_theme_color' => Color::Indigo,
    'project_background_color' => '#ffffff',

    // Routes
    'project_url_homepage' => env('APP_URL'),
    'project_url_admin' => env('APP_URL_ADMIN'),

    /*
    |--------------------------------------------------------------------------
    | Filament
    |--------------------------------------------------------------------------
    */
    'filament' => [
        'spa' => false,
        'google_recaptcha' => false,
        'lock_timeout' => 15,
        'defer_loading' => false,
        'persists' => [
            'sort' => true,
            'filter' => true,
            'search' => true,
            'column_search' => true,
        ],
        'options' => [
            5, 10, 15, 25, 50,
        ],
        'default_option' => 15,

        'modules' => [
            'icon_size' => 16,
            'modal_heading' => 'Módulos',
            'modal_width' => 'screen', // screen, 5xl, lg
            'slide_over' => false,
            'simple' => true,
            'excludes' => [
                'superAdmin',
            ],
            'permissions' => [
                'access Main',
            ],
            'labels' => [
                'main' => 'Principal',
            ],
            'icons' => [
                'main' => 'heroicon-o-cursor-arrow-ripple',
            ],
            'colors' => [
                'main' => Color::Indigo,
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Images
    |--------------------------------------------------------------------------
    */
    'images' => [
        'global' => [
            'amount' => 1,
            'size' => 500,
        ],
        'products' => [
            'amount' => 3,
            'size' => 1000,
        ],
        'services' => [
            'amount' => 3,
            'size' => 1000,
        ],
        'attachments' => [
            'amount' => 5,
            'size' => 1000,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password
    |--------------------------------------------------------------------------
    */
    'passwords' => [
        'min_length' => 8,
        'number' => true,
        'letters' => true,
        'special_character' => true,
        'mixed_case' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | SRI
    |--------------------------------------------------------------------------
    */
    'webservices_sri' => [
        'validar_comprobante' => [
            'pruebas' => 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantesOffline?wsdl',
            'produccion' => 'https://cel.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantesOffline?wsdl',
            'trace' => true,
        ],
        'autorizar_comprobante' => [
            'pruebas' => 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantesOffline?wsdl',
            'produccion' => 'https://cel.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantesOffline?wsdl',
            'trace' => true,
        ],
        'timeout' => 10000,
        'exception' => true,
        'soap_version' => 'SOAP_1_1',
        'cache' => 'WSDL_CACHE_NONE',

        /*
         * MACRO
         */
        'macro' => [
            'persona' => [
                'version' => 2.0,
                'debug' => false,
                'timeout' => 5,
                'retry' => 1,
            ],
        ],
    ],

    'resolutions' => [
        'NAC-DNCRASC20-00000001',
        'NAC-DGERCGC20-00000057',
    ],
    'invoice_max_total_allow_to_final_consumer' => 50,

    /*
    |--------------------------------------------------------------------------
    | Numbers
    |--------------------------------------------------------------------------
    */
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
    'decimals' => [
        'min' => 2,
        'max' => 6,
    ],

    'padLeft' => 9,

    /*
    |--------------------------------------------------------------------------
    | Support
    |--------------------------------------------------------------------------
    */
    'support_email' => 'soporte@dorsisoft.com',
    'support_phone_international' => '593991582148',
    'support_phone' => '0991582148',

    /*
    |--------------------------------------------------------------------------
    | Developer info
    |--------------------------------------------------------------------------
    */
    'developer' => [
        'name' => env('DEVELOPER_NAME'),
        'email' => env('DEVELOPER_EMAIL'),
    ],
];
