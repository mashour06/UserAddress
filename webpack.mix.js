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

mix.autoload({
    jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
});

mix.combine(['resources/assets/js/*.js', 'resources/assets/js/*.map'], 'public/js/app.js')
    .combine('resources/assets/css/*.css', 'public/css/app.css')
    .sourceMaps();
