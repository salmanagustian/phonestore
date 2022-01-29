module.exports = {
    mode: 'jit',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            padding: '1rem',
        },
        extend: {},
        fontFamily: {
          sans: ['Railway', 'sans-serif'],
        },
    },
    plugins: [],
}
