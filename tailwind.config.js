module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            fontFamily: {
                manuka: ["Manuka", "sans-serif"],
                grotesque: ["Basic-Grotesque-Pro", "sans-serif"],
                grotesqueregular: ["Basic-Grotesque-Pro-Regular", "sans-serif"],
                financierdisplay: ["Financier Display", "sans-serif"],
            },
            colors: {
                background: "#F2F2EA",
                text: "#333333",
                yellow: "#FEBE1E",
                pink: "#FFAAF0",
            },
        },
    },
    plugins: [],
};
