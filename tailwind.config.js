import defaultTheme from 'tailwindcss/defaultTheme';
import preset from './vendor/filament/support/tailwind.config.preset';

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/awcodes/filament-table-repeater/resources/**/*.blade.php',
        './vendor/awcodes/filament-quick-create/resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/jaocero/radio-deck/resources/views/**/*.blade.php',
        './vendor/kenepa/resource-lock/resources/**/*.blade.php',
        './vendor/lara-zeus/matrix-choice/resources/views/**/*.blade.php',
        './resources/views/vendor/*.blade.php',
        './resources/views/vendor/filament-panel-switch/panel-switch-menu.blade.php',
        './resources/views/filament/**/*.blade.php',
        './app/Actions/**/*.php',
        './app/Enums/*.php',
        './app/Filament/**/*.php',
        './app/Forms/**/*.php',
        './app/Livewire/*.php',
        './app/Packages/**/*.php',
        './app/Providers/*.php',
        './app/Tables/**/*.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['var(--font-family)', ...defaultTheme.fontFamily.sans],
            },
        },
    },
};
