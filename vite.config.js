import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/filament/admin/theme.css',
                'resources/css/filament/superadmin/theme.css',
            ],
            refresh: [
                ...refreshPaths,
                'app/Actions/**',
                'app/Enums/**',
                'app/Forms/**',
                'app/Livewire/**',
                'app/Filament/**',
                'app/Packages/**',
                'app/Providers/**',
                'app/Tables/**',
            ],
        }),
    ],
});
