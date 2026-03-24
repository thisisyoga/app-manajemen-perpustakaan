import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
            beige: '#F5E8C9',
            Chocolate: '#5D3A2E',
            DarkChocolate: '#333',
            MediumBrown: '#8B5742',
            Caramel: '#C99B66',
            MediumBrown: '#8B5742',
            }
        },
    },
    plugins: [forms],
};