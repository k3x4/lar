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

mix     // frontend
        .js('resources/assets/js/app.js', 'public/assets/js')
        .js('resources/assets/js/dropzone-config.js', 'public/assets/js')
        .sass('resources/assets/sass/app.scss', 'public/assets/css')

        // admin
        .js('resources/assets/js/admin.js', 'public/assets/admin/js')
        .sass('resources/assets/sass/admin.scss', 'public/assets/admin/css')

        //.version()
        ;
