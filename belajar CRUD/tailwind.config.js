/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php", "./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      container: {
        center: "true",
        padding: "16px",
      },
      colors: {
        primary: "#1C325B",
        light: "#F8FAFC",
      },
    },
  },
  plugins: [],
};
