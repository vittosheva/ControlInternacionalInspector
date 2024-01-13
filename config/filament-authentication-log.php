<?php

return [

    'resources' => [
        //'AutenticationLogResource' => \Tapp\FilamentAuthenticationLog\Resources\AuthenticationLogResource::class,
        'AutenticationLogResource' => \App\Filament\SuperAdmin\Resources\AuthenticationLogResource::class,
    ],

    'authenticable-resources' => [
        \App\Models\Persona\User::class,
    ],

    'navigation' => [
        'authentication-log' => [
            'register' => true,
            'sort' => 2,
            'icon' => 'heroicon-o-shield-check',
        ],
    ],

    'sort' => [
        'column' => 'login_at',
        'direction' => 'desc',
    ],
];
