const colors = require("tailwindcss/colors");
const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import("tailwindcss").Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.svg",
    ],
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                "2xs": "2rem",
                xs: "3rem",
                sm: "3rem",
                md: "4rem",
                lg: "5rem",
                xl: "6rem",
            },
            screens: {
                ...defaultTheme.screens,
                xl: "1280px",
                "2xl": "1280px",
            },
        },
        colors: {
            ...colors,
        },
        screens: {
            ...defaultTheme.screens,
        },
        extend: {
            screens: {
                "2xs": "320px",
                xs: "480px",
            },
        },
    },
    plugins: [],
};
