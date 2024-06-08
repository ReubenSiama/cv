/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'black': '#151515',
        'light-black': '#18181B',
        'pencil': '#353839',
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
