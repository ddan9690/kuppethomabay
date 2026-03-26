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
        green: "#008C45",
        "green-dark": "#006533",
        gold: "#C8A265",
        "gold-dark": "#A88744",
        "gray-light": "#F5F5F5",
        gray: "#B0B0B0",
        "gray-dark": "#333333",
        red: "#E63946",
        blue: "#1D4ED8",
        white: "#FFFFFF",
      },
    },
  },

  plugins: [],
}