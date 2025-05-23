/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class', // důležité
  content: ["./**/*.{html,js,php}", "!./node_modules"],
   theme: {
     extend: {
      colors: {
        light: '#fff',
        dark: '#1f2937',
      }
     },
},
   plugins: [],
}