/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
    '!./node_modules/**',
    './assets/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        'job-black':  '#1d1d1b',
        'job-green':  '#00662f',
        'job-green2': '#199738',
      },
      fontFamily: {
        sans: ['"Franklin Gothic Medium"', '"Arial Narrow"', 'Arial', 'sans-serif'],
        body: ['"Franklin Gothic Book"', 'Arial', 'sans-serif'],
      },
      maxWidth: {
        grid: '1200px',
      },
    },
  },
  plugins: [],
}
