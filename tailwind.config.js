const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.svg",
    ],
    theme: {
        container: {
            center: true,
            screens: {
                xs: "540px",
                sm: "640px",
                md: "768px",
                lg: "1024px",
                xl: "1280px",
            },
        },
        colors: {
            ...colors,
        },
        extend: {},
        screens: {
            "2xs": "320px",
            xs: "540px",
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1536px",
        },
    },
    plugins: [],
};
