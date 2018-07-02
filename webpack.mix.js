let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .scripts([
       'resources/assets/js/libs/vendor.js',
       'resources/assets/js/libs/app.js',
    ], 'public/js/all2.js')
   .styles([
       'resources/assets/css/libs/vendor.css',
       'resources/assets/css/libs/app-blue.css',
       'resources/assets/css/libs/app-green.css',
       'resources/assets/css/libs/app-orange.css',
       'resources/assets/css/libs/app-purple.css',
       'resources/assets/css/libs/app-red.css',
       'resources/assets/css/libs/app-seagreen.css',
       'resources/assets/css/libs/app-custom.css',
       'resources/assets/css/libs/app.css',
       'resources/assets/css/libs/overrides.css',
    ], 'public/css/all2.css')
   .sass('resources/assets/sass/app.scss', 'public/css/app2.css');
