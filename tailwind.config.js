/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
      extend: {
        colors: {
        primary: '#fac0b7',
        secondary: '#4d454f',
        accent1: '#a96f4e',
        accent2: '#fff5ff',
      },
    },
  },
  plugins: [],
}
