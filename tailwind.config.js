module.exports = {
  purge: [],
  theme: {
    extend: {
      width: {
        '96': '24rem',
      },
      height: {
        '72': '22rem',
        '80': '26rem',
        '88': '30rem',
        '96': '44rem',
      }
    },
    spinner: (theme) => ({
      default: {
        color: '#dae1e7', // color you want to make the spinner
        size: '1em', // size of the spinner (used for both width and height)
        border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
        speed: '500ms', // the speed at which the spinner should rotate
      },
    }),
  },
  variants: {},
  plugins: [
    require('tailwindcss-spinner')(),
  ],
}
