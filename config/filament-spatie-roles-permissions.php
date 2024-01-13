<?php

return [

    'preload_roles' => true,

    'preload_permissions' => true,

    'navigation_section_group' => 'filament-spatie-roles-permissions::filament-spatie.section.roles_and_permissions', // Default uses language constant

    'team_model' => \App\Models\Core\Company::class,

    /*
     * Set as false to remove from navigation.
     */
    'should_register_on_navigation' => [
        'permissions' => true,
        'roles' => true,
    ],

    'guard_names' => [
        'web' => 'web',
        'api' => 'api',
    ],

    'toggleable_guard_names' => [
        'roles' => [
            'isToggledHiddenByDefault' => true,
        ],
        'permissions' => [
            'isToggledHiddenByDefault' => true,
        ],
    ],

    'default_guard_name' => null,

    'model_filter_key' => 'return \'%\'.$key;', // Eg: 'return \'%\'.$key.'\%\';'

    'user_name_column' => 'name',

    /*
     * Icons to use for navigation
     */
    'icons' => [
        'role_navigation' => 'heroicon-o-lock-closed',
        'permission_navigation' => 'heroicon-o-lock-closed',
    ],

    'generator' => [

        'guard_names' => [
            'web',
            //'api',
        ],

        'permission_affixes' => [

            /*
             * Permissions Aligned with Policies.
             * DO NOT change the keys unless the genericPolicy.stub is published and altered accordingly
             */
            'viewAnyPermission' => 'view-any',
            'viewPermission' => 'view',
            'createPermission' => 'create',
            'updatePermission' => 'update',
            'deletePermission' => 'delete',
            //'restorePermission' => 'restore',
            //'forceDeletePermission' => 'force-delete',

            /*
             * Additional Resource Permissions
             */
            'replicate',
            'reorder',
        ],

        /*
         * returns the "name" for the permission.
         *
         * $permission which is an iteration of [permission_affixes] ,
         * $model The model to which the $permission will be concatenated
         *
         * Eg: 'permission_name' => 'return $permissionAffix . ' ' . Str::kebab($modelName),
         *
         * Note: If you are changing the "permission_name", It's recommended to run with --clean to avoid duplications
         */
        'permission_name' => 'return $permissionAffix . \' \' . $modelName;',

        /*
         * Permissions will be generated for the models associated with the respective Filament Resources
         */
        'discover_models_through_filament_resources' => false,

        /*
         * Include directories which consist of models.
         */
        'model_directories' => [
            app_path('Models'),
            app_path('Models/Common'),
            app_path('Models/Core'),
            app_path('Models/Inventory'),
            app_path('Models/Persona'),
        ],

        /*
         * Define custom_models
         */
        'custom_models' => [
            //
        ],

        /*
         * Define excluded_models
         */
        'excluded_models' => [
            \App\Models\Common\CategoryType::class,
            \App\Models\Common\IdentificationType::class,

            App\Models\Core\CompanySetting::class,
            App\Models\Core\CompanyUser::class,
            App\Models\Core\Media::class,

            \App\Models\Locale\City::class,
            \App\Models\Locale\Country::class,
            \App\Models\Locale\Currency::class,
            \App\Models\Locale\State::class,
        ],

        'excluded_policy_models' => [
            \App\Models\Common\CategoryType::class,
            \App\Models\Common\IdentificationType::class,

            \App\Models\Core\CompanySetting::class,
            \App\Models\Core\CompanyUser::class,
            \App\Models\Core\Media::class,

            \App\Models\Locale\City::class,
            \App\Models\Locale\Country::class,
            \App\Models\Locale\Currency::class,
            \App\Models\Locale\State::class,
        ],

        /*
         * Define any other permission that should be synced with the DB
         */
        'custom_permissions' => [
            ...config('dorsi.filament.modules.permissions'),
            'consume Webservice',
            'unlock Panel',
            'unlock Resource',
        ],

        'user_model' => \App\Models\Persona\User::class,

        'policies_namespace' => 'App\Policies',
    ],
];
