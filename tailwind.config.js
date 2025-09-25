const colors = require('@tailwindcss/ui/colors');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],


    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
          ...colors,
          cyan: {
            50: '#ECFEFF',
            100: '#CFFAFE',
            200: '#A5F3FC',
            300: '#67E8F9',
            400: '#22D3EE',
            500: '#06B6D4',
            600: '#0891B2',
            700: '#0E7490',
            800: '#155E75',
            900: '#164E63',
          }
        }
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled', 'active']
    },

    plugins: [require('@tailwindcss/ui')],
};
