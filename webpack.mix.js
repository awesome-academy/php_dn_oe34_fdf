const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('node_modules/admin-lte/docs_html/assets/img/', 'public/template/adminLTE/img')
    .copyDirectory('resources/css/', 'public/template/css')
    .copyDirectory('resources/css/admin', 'public/css/admin')
    .js('resources/js/users/list.js', 'public/js/users')
    .js('resources/js/categories/list.js', 'public/js/categories')
    .js('resources/js/products/list.js', 'public/js/products')
    .js('resources/js/carts/cart.js', 'public/js/carts')
    .js('resources/js/carts/list.js', 'public/js/carts')
    .js('resources/js/carts/get_products.js', 'public/js/carts')
    .js('resources/js/orders/list.js', 'public/js/orders')
    .js('resources/js/orders/create.js', 'public/js/orders')
