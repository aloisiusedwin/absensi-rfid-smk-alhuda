/** @type {import('tailwindcss').Config} */
<<<<<<< HEAD
module.exports = {
  content: [
      './resources/views/**/*.blade.php',
      './resources/js/**/*.js',
      './resources/js/**/*.vue',
  ],
  theme: {
      extend: {},
  },
  plugins: [],
};
=======
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {'Montserrat': ['Montserrat', 'sans-serif']},
    },
  },
  plugins: [],
}
>>>>>>> d91873e6e894c35cd200fa5f79ff2ef11cc02b6a
