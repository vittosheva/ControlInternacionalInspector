<?php

return [
    // Command to run when clearing the cache
    'default_commands' => [
        'icons:clear',
        'optimize:clear',
        'optimize',
        'event:cache',
        'view:cache',
        'icons:cache',
    ],

    // Session name for the indicator count
    'changes_count' => 'session_key',

    // Livewire component for clear cache button in header.
    'livewireComponentClass' => CmsMulti\FilamentClearCache\Http\Livewire\ClearCache::class,

    // Permissions check
    'permissions' => false,

    // Role check
    'role' => false,
];
