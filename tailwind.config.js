import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: "#2772A0",
                    light: "#3A8CC1",
                    dark: "#1A4B6D",
                },
                secondary: {
                    DEFAULT: "#CCDDEA",
                    light: "#E0E8F2",
                    dark: "#A1B3C0",
                },
            },
        },
    },

    plugins: [forms],
};
