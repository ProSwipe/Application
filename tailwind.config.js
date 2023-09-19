/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./app/*.php",
        "./app/**/*.php",
        "./app/**/**/*.php",
        "./app/**/**/**/*.php",
        "./app/**/**/**/**/*.php",
        "./app/**/*.{html,js}",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
