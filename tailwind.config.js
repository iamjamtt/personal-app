const colors = require('tailwindcss/colors')

module.exports = {
    darkMode: 'media',
    content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },
        },
    },
    plugins: [
        require('flowbite/plugin'),
        // require('@tailwindcss/forms'),
    ],
}
