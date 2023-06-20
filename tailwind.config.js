/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", "sans-serif"],
                serif: ["Open Sans", "serif"],
            },
            colors: {
                primary: "#50d0b7",
                "primary-dark": "#34b59c",
                secondary: "#f3735d",
                "secondary-dark": "#d55d48",
            },
        },
    },
    plugins: [require("@tailwindcss/typography", '@tailwindcss/forms')],
};
