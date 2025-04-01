const mix = require('laravel-mix');

// Biên dịch và tối ưu JS
mix.js('public/js/main.js', 'public/js') // Tối ưu file main.js
   .js('public/plugin/jquery-3.7.1.min.js', 'public/js') // Tối ưu jQuery (nếu cần)
   .combine([
       'public/js/main.js',
       'public/plugin/jquery-3.7.1.min.js',
       'public/plugin/bootstrap/js/*.js', // Nếu bạn muốn gộp các file JS của Bootstrap
       'public/plugin/fontawesome/js/*.js' // Nếu bạn muốn gộp các file JS của FontAwesome
   ], 'public/js/all.js') // Gộp tất cả JS thành một file all.js

// Biên dịch và tối ưu CSS
   .postCss('public/css/style.css', 'public/css') // Tối ưu file style.css
   .postCss('public/css/responsive.css', 'public/css') // Tối ưu file responsive.css
   .combine([
       'public/css/style.css',
       'public/css/responsive.css',
       'public/plugin/bootstrap/css/*.css', // Gộp CSS của Bootstrap
       'public/plugin/fontawesome/css/*.css' // Gộp CSS của FontAwesome
   ], 'public/css/all.css') // Gộp tất cả CSS thành một file all.css

// Tối ưu hóa (minify) trong môi trường production
if (mix.inProduction()) {
    mix.version(); // Thêm version để tránh cache
}