const { mix } = require('laravel-mix');

mix.options({
    uglify: {
        sourceMap: true,
        compress: {
            warnings: false,
            drop_console: false
        }
    }
});

mix.js('resources/js/scripts.js', 'public/js')
    .sass('resources/sass/main.scss', 'public/css')
    .copy('resources/css/styles.css', 'public/css')
    .copy('resources/css/style.css', 'public/css');
