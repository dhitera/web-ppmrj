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
            backgroundImage: {
                fotoPpm: 'url("public/img/foto-ppm.jpg")',
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
