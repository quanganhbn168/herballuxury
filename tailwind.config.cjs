module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./storage/framework/views/*.php",
  ],
  important: '#app',
  theme: {
    container: {
      center: true,
      padding: '1rem',
      screens: {
        sm: '540px',
        md: '720px',
        lg: '960px',
        xl: '1140px',
      },
    },
    extend: {
      colors: {
        primary: {
          500: '#3B82F6',
          600: '#2563EB',
        },
      },
    },
  },
  plugins: [],
}