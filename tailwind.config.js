import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        // './resources/views/**/*.blade.php',
        // './resources/views/admin/dashboard/dashboard-client.blade.php',
        "./node_modules/flowbite/**/*.js",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    safelist: [
        "text-transparent", "text-current", "text-black", "text-white", "text-theme-secondary-50", "text-theme-secondary-100", "text-theme-secondary-200", "text-theme-secondary-300", "text-theme-secondary-400", "text-theme-secondary-500", "text-theme-secondary-600", "text-theme-secondary-700", "text-theme-secondary-800", "text-theme-secondary-900", "text-theme-danger-50", "text-theme-danger-100", "text-theme-danger-200", "text-theme-danger-300", "text-theme-danger-400", "text-theme-danger-500", "text-theme-danger-600", "text-theme-danger-700", "text-theme-danger-800", "text-theme-danger-900", "text-theme-warning-50", "text-theme-warning-100", "text-theme-warning-200", "text-theme-warning-300", "text-theme-warning-400", "text-theme-warning-500", "text-theme-warning-600", "text-theme-warning-700", "text-theme-warning-800", "text-theme-warning-900", "text-theme-success-50", "text-theme-success-100", "text-theme-success-200", "text-theme-success-300", "text-theme-success-400", "text-theme-success-500", "text-theme-success-600", "text-theme-success-700", "text-theme-success-800", "text-theme-success-900", "text-theme-info-50", "text-theme-info-100", "text-theme-info-200", "text-theme-info-300", "text-theme-info-400", "text-theme-info-500", "text-theme-info-600", "text-theme-info-700", "text-theme-info-800", "text-theme-info-900", "text-theme-primary-50", "text-theme-primary-100", "text-theme-primary-200", "text-theme-primary-300", "text-theme-primary-400", "text-theme-primary-500", "text-theme-primary-600", "text-theme-primary-700", "text-theme-primary-800", "text-theme-primary-900", "text-purple-50", "text-purple-100", "text-purple-200", "text-purple-300", "text-purple-400", "text-purple-500", "text-purple-600", "text-purple-700", "text-purple-800", "text-purple-900", "text-pink-50", "text-pink-100", "text-pink-200", "text-pink-300", "text-pink-400", "text-pink-500", "text-pink-600", "text-pink-700", "text-pink-800", "text-pink-900",
        "border-transparent", "border-current", "border-black", "border-white", "border-theme-secondary-50", "border-theme-secondary-100", "border-theme-secondary-200", "border-theme-secondary-300", "border-theme-secondary-400", "border-theme-secondary-500", "border-theme-secondary-600", "border-theme-secondary-700", "border-theme-secondary-800", "border-theme-secondary-900", "border-theme-danger-50", "border-theme-danger-100", "border-theme-danger-200", "border-theme-danger-300", "border-theme-danger-400", "border-theme-danger-500", "border-theme-danger-600", "border-theme-danger-700", "border-theme-danger-800", "border-theme-danger-900", "border-theme-warning-50", "border-theme-warning-100", "border-theme-warning-200", "border-theme-warning-300", "border-theme-warning-400", "border-theme-warning-500", "border-theme-warning-600", "border-theme-warning-700", "border-theme-warning-800", "border-theme-warning-900", "border-theme-success-50", "border-theme-success-100", "border-theme-success-200", "border-theme-success-300", "border-theme-success-400", "border-theme-success-500", "border-theme-success-600", "border-theme-success-700", "border-theme-success-800", "border-theme-success-900", "border-theme-info-50", "border-theme-info-100", "border-theme-info-200", "border-theme-info-300", "border-theme-info-400", "border-theme-info-500", "border-theme-info-600", "border-theme-info-700", "border-theme-info-800", "border-theme-info-900", "border-theme-primary-50", "border-theme-primary-100", "border-theme-primary-200", "border-theme-primary-300", "border-theme-primary-400", "border-theme-primary-500", "border-theme-primary-600", "border-theme-primary-700", "border-theme-primary-800", "border-theme-primary-900", "border-purple-50", "border-purple-100", "border-purple-200", "border-purple-300", "border-purple-400", "border-purple-500", "border-purple-600", "border-purple-700", "border-purple-800", "border-purple-900", "border-pink-50", "border-pink-100", "border-pink-200", "border-pink-300", "border-pink-400", "border-pink-500", "border-pink-600", "border-pink-700", "border-pink-800", "border-pink-900",
        "bg-transparent", "bg-current", "bg-black", "bg-white", "bg-theme-secondary-50", "bg-theme-secondary-100", "bg-theme-secondary-200", "bg-theme-secondary-300", "bg-theme-secondary-400", "bg-theme-secondary-500", "bg-theme-secondary-600", "bg-theme-secondary-700", "bg-theme-secondary-800", "bg-theme-secondary-900", "bg-theme-danger-50", "bg-theme-danger-100", "bg-theme-danger-200", "bg-theme-danger-300", "bg-theme-danger-400", "bg-theme-danger-500", "bg-theme-danger-600", "bg-theme-danger-700", "bg-theme-danger-800", "bg-theme-danger-900", "bg-theme-warning-50", "bg-theme-warning-100", "bg-theme-warning-200", "bg-theme-warning-300", "bg-theme-warning-400", "bg-theme-warning-500", "bg-theme-warning-600", "bg-theme-warning-700", "bg-theme-warning-800", "bg-theme-warning-900", "bg-theme-success-50", "bg-theme-success-100", "bg-theme-success-200", "bg-theme-success-300", "bg-theme-success-400", "bg-theme-success-500", "bg-theme-success-600", "bg-theme-success-700", "bg-theme-success-800", "bg-theme-success-900", "bg-theme-info-50", "bg-theme-info-100", "bg-theme-info-200", "bg-theme-info-300", "bg-theme-info-400", "bg-theme-info-500", "bg-theme-info-600", "bg-theme-info-700", "bg-theme-info-800", "bg-theme-info-900", "bg-theme-primary-50", "bg-theme-primary-100", "bg-theme-primary-200", "bg-theme-primary-300", "bg-theme-primary-400", "bg-theme-primary-500", "bg-theme-primary-600", "bg-theme-primary-700", "bg-theme-primary-800", "bg-theme-primary-900", "bg-purple-50", "bg-purple-100", "bg-purple-200", "bg-purple-300", "bg-purple-400", "bg-purple-500", "bg-purple-600", "bg-purple-700", "bg-purple-800", "bg-purple-900", "bg-pink-50", "bg-pink-100", "bg-pink-200", "bg-pink-300", "bg-pink-400", "bg-pink-500", "bg-pink-600", "bg-pink-700", "bg-pink-800", "bg-pink-900",
        "hover:bg-transparent", "hover:bg-current", "hover:bg-black", "hover:bg-white", "hover:bg-theme-secondary-50", "hover:bg-theme-secondary-100", "hover:bg-theme-secondary-200", "hover:bg-theme-secondary-300", "hover:bg-theme-secondary-400", "hover:bg-theme-secondary-500", "hover:bg-theme-secondary-600", "hover:bg-theme-secondary-700", "hover:bg-theme-secondary-800", "hover:bg-theme-secondary-900", "hover:bg-theme-danger-50", "hover:bg-theme-danger-100", "hover:bg-theme-danger-200", "hover:bg-theme-danger-300", "hover:bg-theme-danger-400", "hover:bg-theme-danger-500", "hover:bg-theme-danger-600", "hover:bg-theme-danger-700", "hover:bg-theme-danger-800", "hover:bg-theme-danger-900", "hover:bg-theme-warning-50", "hover:bg-theme-warning-100", "hover:bg-theme-warning-200", "hover:bg-theme-warning-300", "hover:bg-theme-warning-400", "hover:bg-theme-warning-500", "hover:bg-theme-warning-600", "hover:bg-theme-warning-700", "hover:bg-theme-warning-800", "hover:bg-theme-warning-900", "hover:bg-theme-success-50", "hover:bg-theme-success-100", "hover:bg-theme-success-200", "hover:bg-theme-success-300", "hover:bg-theme-success-400", "hover:bg-theme-success-500", "hover:bg-theme-success-600", "hover:bg-theme-success-700", "hover:bg-theme-success-800", "hover:bg-theme-success-900", "hover:bg-theme-info-50", "hover:bg-theme-info-100", "hover:bg-theme-info-200", "hover:bg-theme-info-300", "hover:bg-theme-info-400", "hover:bg-theme-info-500", "hover:bg-theme-info-600", "hover:bg-theme-info-700", "hover:bg-theme-info-800", "hover:bg-theme-info-900", "hover:bg-theme-primary-50", "hover:bg-theme-primary-100", "hover:bg-theme-primary-200", "hover:bg-theme-primary-300", "hover:bg-theme-primary-400", "hover:bg-theme-primary-500", "hover:bg-theme-primary-600", "hover:bg-theme-primary-700", "hover:bg-theme-primary-800", "hover:bg-theme-primary-900", "hover:bg-purple-50", "hover:bg-purple-100", "hover:bg-purple-200", "hover:bg-purple-300", "hover:bg-purple-400", "hover:bg-purple-500", "hover:bg-purple-600", "hover:bg-purple-700", "hover:bg-purple-800", "hover:bg-purple-900", "hover:bg-pink-50", "hover:bg-pink-100", "hover:bg-pink-200", "hover:bg-pink-300", "hover:bg-pink-400", "hover:bg-pink-500", "hover:bg-pink-600", "hover:bg-pink-700", "hover:bg-pink-800", "hover:bg-pink-900",
        "dark:text-transparent", "dark:text-current", "dark:text-black", "dark:text-white", "dark:text-theme-secondary-50", "dark:text-theme-secondary-100", "dark:text-theme-secondary-200", "dark:text-theme-secondary-300", "dark:text-theme-secondary-400", "dark:text-theme-secondary-500", "dark:text-theme-secondary-600", "dark:text-theme-secondary-700", "dark:text-theme-secondary-800", "dark:text-theme-secondary-900", "dark:text-theme-danger-50", "dark:text-theme-danger-100", "dark:text-theme-danger-200", "dark:text-theme-danger-300", "dark:text-theme-danger-400", "dark:text-theme-danger-500", "dark:text-theme-danger-600", "dark:text-theme-danger-700", "dark:text-theme-danger-800", "dark:text-theme-danger-900", "dark:text-theme-warning-50", "dark:text-theme-warning-100", "dark:text-theme-warning-200", "dark:text-theme-warning-300", "dark:text-theme-warning-400", "dark:text-theme-warning-500", "dark:text-theme-warning-600", "dark:text-theme-warning-700", "dark:text-theme-warning-800", "dark:text-theme-warning-900", "dark:text-theme-success-50", "dark:text-theme-success-100", "dark:text-theme-success-200", "dark:text-theme-success-300", "dark:text-theme-success-400", "dark:text-theme-success-500", "dark:text-theme-success-600", "dark:text-theme-success-700", "dark:text-theme-success-800", "dark:text-theme-success-900", "dark:text-theme-info-50", "dark:text-theme-info-100", "dark:text-theme-info-200", "dark:text-theme-info-300", "dark:text-theme-info-400", "dark:text-theme-info-500", "dark:text-theme-info-600", "dark:text-theme-info-700", "dark:text-theme-info-800", "dark:text-theme-info-900", "dark:text-theme-primary-50", "dark:text-theme-primary-100", "dark:text-theme-primary-200", "dark:text-theme-primary-300", "dark:text-theme-primary-400", "dark:text-theme-primary-500", "dark:text-theme-primary-600", "dark:text-theme-primary-700", "dark:text-theme-primary-800", "dark:text-theme-primary-900", "dark:text-purple-50", "dark:text-purple-100", "dark:text-purple-200", "dark:text-purple-300", "dark:text-purple-400", "dark:text-purple-500", "dark:text-purple-600", "dark:text-purple-700", "dark:text-purple-800", "dark:text-purple-900", "dark:text-pink-50", "dark:text-pink-100", "dark:text-pink-200", "dark:text-pink-300", "dark:text-pink-400", "dark:text-pink-500", "dark:text-pink-600", "dark:text-pink-700", "dark:text-pink-800", "dark:text-pink-900",
        "dark:border-transparent", "dark:border-current", "dark:border-black", "dark:border-white", "dark:border-theme-secondary-50", "dark:border-theme-secondary-100", "dark:border-theme-secondary-200", "dark:border-theme-secondary-300", "dark:border-theme-secondary-400", "dark:border-theme-secondary-500", "dark:border-theme-secondary-600", "dark:border-theme-secondary-700", "dark:border-theme-secondary-800", "dark:border-theme-secondary-900", "dark:border-theme-danger-50", "dark:border-theme-danger-100", "dark:border-theme-danger-200", "dark:border-theme-danger-300", "dark:border-theme-danger-400", "dark:border-theme-danger-500", "dark:border-theme-danger-600", "dark:border-theme-danger-700", "dark:border-theme-danger-800", "dark:border-theme-danger-900", "dark:border-theme-warning-50", "dark:border-theme-warning-100", "dark:border-theme-warning-200", "dark:border-theme-warning-300", "dark:border-theme-warning-400", "dark:border-theme-warning-500", "dark:border-theme-warning-600", "dark:border-theme-warning-700", "dark:border-theme-warning-800", "dark:border-theme-warning-900", "dark:border-theme-success-50", "dark:border-theme-success-100", "dark:border-theme-success-200", "dark:border-theme-success-300", "dark:border-theme-success-400", "dark:border-theme-success-500", "dark:border-theme-success-600", "dark:border-theme-success-700", "dark:border-theme-success-800", "dark:border-theme-success-900", "dark:border-theme-info-50", "dark:border-theme-info-100", "dark:border-theme-info-200", "dark:border-theme-info-300", "dark:border-theme-info-400", "dark:border-theme-info-500", "dark:border-theme-info-600", "dark:border-theme-info-700", "dark:border-theme-info-800", "dark:border-theme-info-900", "dark:border-theme-primary-50", "dark:border-theme-primary-100", "dark:border-theme-primary-200", "dark:border-theme-primary-300", "dark:border-theme-primary-400", "dark:border-theme-primary-500", "dark:border-theme-primary-600", "dark:border-theme-primary-700", "dark:border-theme-primary-800", "dark:border-theme-primary-900", "dark:border-purple-50", "dark:border-purple-100", "dark:border-purple-200", "dark:border-purple-300", "dark:border-purple-400", "dark:border-purple-500", "dark:border-purple-600", "dark:border-purple-700", "dark:border-purple-800", "dark:border-purple-900", "dark:border-pink-50", "dark:border-pink-100", "dark:border-pink-200", "dark:border-pink-300", "dark:border-pink-400", "dark:border-pink-500", "dark:border-pink-600", "dark:border-pink-700", "dark:border-pink-800", "dark:border-pink-900",
        "dark:bg-transparent", "dark:bg-current", "dark:bg-black", "dark:bg-white", "dark:bg-theme-secondary-50", "dark:bg-theme-secondary-100", "dark:bg-theme-secondary-200", "dark:bg-theme-secondary-300", "dark:bg-theme-secondary-400", "dark:bg-theme-secondary-500", "dark:bg-theme-secondary-600", "dark:bg-theme-secondary-700", "dark:bg-theme-secondary-800", "dark:bg-theme-secondary-900", "dark:bg-theme-danger-50", "dark:bg-theme-danger-100", "dark:bg-theme-danger-200", "dark:bg-theme-danger-300", "dark:bg-theme-danger-400", "dark:bg-theme-danger-500", "dark:bg-theme-danger-600", "dark:bg-theme-danger-700", "dark:bg-theme-danger-800", "dark:bg-theme-danger-900", "dark:bg-theme-warning-50", "dark:bg-theme-warning-100", "dark:bg-theme-warning-200", "dark:bg-theme-warning-300", "dark:bg-theme-warning-400", "dark:bg-theme-warning-500", "dark:bg-theme-warning-600", "dark:bg-theme-warning-700", "dark:bg-theme-warning-800", "dark:bg-theme-warning-900", "dark:bg-theme-success-50", "dark:bg-theme-success-100", "dark:bg-theme-success-200", "dark:bg-theme-success-300", "dark:bg-theme-success-400", "dark:bg-theme-success-500", "dark:bg-theme-success-600", "dark:bg-theme-success-700", "dark:bg-theme-success-800", "dark:bg-theme-success-900", "dark:bg-theme-info-50", "dark:bg-theme-info-100", "dark:bg-theme-info-200", "dark:bg-theme-info-300", "dark:bg-theme-info-400", "dark:bg-theme-info-500", "dark:bg-theme-info-600", "dark:bg-theme-info-700", "dark:bg-theme-info-800", "dark:bg-theme-info-900", "dark:bg-theme-primary-50", "dark:bg-theme-primary-100", "dark:bg-theme-primary-200", "dark:bg-theme-primary-300", "dark:bg-theme-primary-400", "dark:bg-theme-primary-500", "dark:bg-theme-primary-600", "dark:bg-theme-primary-700", "dark:bg-theme-primary-800", "dark:bg-theme-primary-900", "dark:bg-purple-50", "dark:bg-purple-100", "dark:bg-purple-200", "dark:bg-purple-300", "dark:bg-purple-400", "dark:bg-purple-500", "dark:bg-purple-600", "dark:bg-purple-700", "dark:bg-purple-800", "dark:bg-purple-900", "dark:bg-pink-50", "dark:bg-pink-100", "dark:bg-pink-200", "dark:bg-pink-300", "dark:bg-pink-400", "dark:bg-pink-500", "dark:bg-pink-600", "dark:bg-pink-700", "dark:bg-pink-800", "dark:bg-pink-900",
        "dark:hover:bg-transparent", "dark:hover:bg-current", "dark:hover:bg-black", "dark:hover:bg-white", "dark:hover:bg-theme-secondary-50", "dark:hover:bg-theme-secondary-100", "dark:hover:bg-theme-secondary-200", "dark:hover:bg-theme-secondary-300", "dark:hover:bg-theme-secondary-400", "dark:hover:bg-theme-secondary-500", "dark:hover:bg-theme-secondary-600", "dark:hover:bg-theme-secondary-700", "dark:hover:bg-theme-secondary-800", "dark:hover:bg-theme-secondary-900", "dark:hover:bg-theme-danger-50", "dark:hover:bg-theme-danger-100", "dark:hover:bg-theme-danger-200", "dark:hover:bg-theme-danger-300", "dark:hover:bg-theme-danger-400", "dark:hover:bg-theme-danger-500", "dark:hover:bg-theme-danger-600", "dark:hover:bg-theme-danger-700", "dark:hover:bg-theme-danger-800", "dark:hover:bg-theme-danger-900", "dark:hover:bg-theme-warning-50", "dark:hover:bg-theme-warning-100", "dark:hover:bg-theme-warning-200", "dark:hover:bg-theme-warning-300", "dark:hover:bg-theme-warning-400", "dark:hover:bg-theme-warning-500", "dark:hover:bg-theme-warning-600", "dark:hover:bg-theme-warning-700", "dark:hover:bg-theme-warning-800", "dark:hover:bg-theme-warning-900", "dark:hover:bg-theme-success-50", "dark:hover:bg-theme-success-100", "dark:hover:bg-theme-success-200", "dark:hover:bg-theme-success-300", "dark:hover:bg-theme-success-400", "dark:hover:bg-theme-success-500", "dark:hover:bg-theme-success-600", "dark:hover:bg-theme-success-700", "dark:hover:bg-theme-success-800", "dark:hover:bg-theme-success-900", "dark:hover:bg-theme-info-50", "dark:hover:bg-theme-info-100", "dark:hover:bg-theme-info-200", "dark:hover:bg-theme-info-300", "dark:hover:bg-theme-info-400", "dark:hover:bg-theme-info-500", "dark:hover:bg-theme-info-600", "dark:hover:bg-theme-info-700", "dark:hover:bg-theme-info-800", "dark:hover:bg-theme-info-900", "dark:hover:bg-theme-primary-50", "dark:hover:bg-theme-primary-100", "dark:hover:bg-theme-primary-200", "dark:hover:bg-theme-primary-300", "dark:hover:bg-theme-primary-400", "dark:hover:bg-theme-primary-500", "dark:hover:bg-theme-primary-600", "dark:hover:bg-theme-primary-700", "dark:hover:bg-theme-primary-800", "dark:hover:bg-theme-primary-900", "dark:hover:bg-purple-50", "dark:hover:bg-purple-100", "dark:hover:bg-purple-200", "dark:hover:bg-purple-300", "dark:hover:bg-purple-400", "dark:hover:bg-purple-500", "dark:hover:bg-purple-600", "dark:hover:bg-purple-700", "dark:hover:bg-purple-800", "dark:hover:bg-purple-900", "dark:hover:bg-pink-50", "dark:hover:bg-pink-100", "dark:hover:bg-pink-200", "dark:hover:bg-pink-300", "dark:hover:bg-pink-400", "dark:hover:bg-pink-500", "dark:hover:bg-pink-600", "dark:hover:bg-pink-700", "dark:hover:bg-pink-800", "dark:hover:bg-pink-900",
    ],

    theme: {
        colors: {
            // Configure your color palette here
            'theme-primary': {
                    '50': '#18ACFF',
                    '100': '#9BC3E4 !important',
                    '200': '#008CD9 !important',
                    '300': '#0069A3 !important',
                    '400': '#004F7A !important',
                    '500': '#003D5F !important',
                    '600': '#05455C !important',
                    '700': '#002B42 !important',
                    '800': '#002033 !important',
                    '900': '#001724 !important',
                    '950': '#00101A !important'
            },
            'theme-success': {
                '50': '#0FD79B !important',
                '100': '#0EC48D !important',
                '200': '#0B9D71 !important',
                '300': '#087756 !important',
                "400": '#06513A !important',
                '500': '#043929 !important',
                '600': '#032B1F !important',
                '700': '#021D15 !important',
                '800': '#010E0A !important',
            },

            'theme-danger': {
                '50': '#FFE6E5 !important',
                '100': '#FFD7D6 !important',
                '200': '#FFCDCC !important',
                '300': '#FFA5A4 !important',
                '400': '#FF7C7B !important',
                '500': '#FF5452 !important',
                '600': '#FF3533 !important',
                "700": '#F00300 !important',
                '800': '#CC0200 !important',
                "900": '#990200 !important',
                '950': '#850200 !important'
            },
            'theme-warning': {
                '50': '#fdfdea !important',
                '100': '#fafbc6 !important',
                '200': '#f8f590 !important',
                '300': '#f4e950 !important',
                '400': '#efd820 !important',
                '500': '#ffab00 !important',
                '600': '#c0970e !important',
                '700': '#996e0f !important',
                '800': '#7f5714 !important',
                '900': '#6c4717 !important',
                '950': '#3f2509 !important',
            },

            'theme-info': {
                '50': '#ecfcff !important',
                '100': '#cff8fe !important',
                '200': '#a5f0fc !important',
                '300': '#67e6f9 !important',
                '400': '#22d3ee !important',
                '500': '#06b9d4 !important',
                '600': '#089bb2 !important',
                '700': '#0e7f90 !important',
                '800': '#156875 !important',
                '900': '#165963 !important',
                '950': '#083c44 !important',
            },
            'theme-secondary': {
                '50': '#f6f6f6 !important',
                '100': '#e7e7e7 !important',
                '200': '#d1d1d1 !important',
                '300': '#b0b0b0 !important',
                '400': '#888888 !important',
                '500': '#6d6d6d !important',
                '600': '#5d5d5d !important',
                '700': '#4c4c4c !important',
                '800': '#454545 !important',
                '900': '#3d3d3d !important',
                '950': '#262626 !important',
            },
        },
        extend: {
            fontFamily: {
                sans: ['Montserrat', 'Raleway Extrabold', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('flowbite/plugin')({
            charts: true,
        }),
        // ... other plugins
    ]
};
