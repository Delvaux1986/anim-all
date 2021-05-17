const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        textColor: theme => theme('colors'),
            textColor: {
            'white': '#F1F8F7',
            'green': '#5DB0A1',
            'pink': '#BA455A',
            'black' : '#070D0C',
        },
        backgroundColor: theme => ({
            ...theme('colors'),
            'white': '#F1F8F7',
            'green': '#5DB0A1',
            'pink': '#BA455A',
            'black':'#070D0C',
           }),
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
