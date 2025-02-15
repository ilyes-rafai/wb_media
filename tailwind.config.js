import forms from "@tailwindcss/forms";
import defaultTheme from "tailwindcss/defaultTheme";
import plugin from "tailwindcss/plugin";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.jsx",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                ilyes: "#00E472",
            },
            animation: {
                "bounce-slow": "bounce 5s linear infinite",
                ticker: "ticker-scroll 50s linear infinite",
            },
            keyframes: {
                "ticker-scroll": {
                    "0%": { transform: "translateX(0)" },
                    "100%": { transform: "translateX(-50%)" },
                },
            },
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
                arabic: ["Alexandria", "sans-serif"],
            },
        },
    },

    plugins: [forms],
};
