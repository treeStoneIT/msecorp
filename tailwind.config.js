const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

/** @type {import("@types/tailwindcss/tailwind-config").TailwindConfig } */
module.exports = {
  content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Lato"', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        'warm-gray': colors.stone,
        primary: {
          "50": "#8eeb79",
          "100": "#84e16f",
          "200": "#7ad765",
          "300": "#70cd5b",
          "400": "#66c351",
          "500": "#5cb947",
          DEFAULT: "#5cb947",
          "600": "#52af3d",
          "700": "#48a533",
          "800": "#3e9b29",
          "900": "#34911f"
        },
        secondary: {
          DEFAULT: '#BBBCBF'
        },
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/aspect-ratio'),
  ],
}
