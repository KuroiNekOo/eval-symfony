/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#334155', // slate-700
        secondary: '#0d9488', // teal-600
      },
    },
  },
  plugins: [],
}
