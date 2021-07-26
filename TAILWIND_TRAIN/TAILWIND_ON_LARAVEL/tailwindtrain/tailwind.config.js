module.exports = {
  purge: [],
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors :{
        test:'#00F'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
