/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                'black': '#151515',
                'light-black': '#202020',
                'pencil': '#353839',
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ]
}
