const mix = require('laravel-mix');
mix.options({
    uglify: {
        sourceMap: true,
        compress: {
            warnings: false,
            drop_console: false
        }
    }
});

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

mix.js('resources/js/scripts.js', 'public/js')
    .sass('resources/sass/main.scss', 'public/css')
    .copy('resources/css/styles.css', 'public/css')
    .copy('resources/css/style.css', 'public/css');
