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

mix     //.js('resources/assets/js/app.js', 'public/js')
        .js('resources/assets/js/scripts.js', 'public/js')
        .js('resources/assets/js/admin.js', 'public/js')
        .js('resources/assets/js/dropzone-config.js', 'public/js')
        //.js('resources/assets/js/elfinder.js', 'public/js')

        .sass('resources/theme/sass/theme.scss', 'public/theme/css')
        .sass('resources/theme/sass/theme-blog.scss', 'public/theme/css')
        .sass('resources/theme/sass/theme-elements.scss', 'public/theme/css')
        .sass('resources/theme/sass/theme-shop.scss', 'public/theme/css')
        
        .sass('resources/assets/sass/style.scss', 'public/css')
        .sass('resources/assets/sass/admin.scss', 'public/css');
