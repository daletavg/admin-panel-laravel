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


mix.copyDirectory('resources/img', 'public/img');
mix.copyDirectory('resources/libs', 'public/libs');
mix.copyDirectory('resources/fonts', 'public/fonts');
mix.sass('resources/sass/admin/material-dashboard.scss', 'public/css/admin')
    .sass('resources/sass/admin/admin-main.scss', 'public/css/admin')
    .sass('resources/sass/admin/styles.scss', 'public/css/admin');

mix.js('resources/js/admin/index.js', 'public/js/admin/admin.js');


mix.scripts([
    'public/js/core/popper.min.js',
    'public/js/core/bootstrap-material-design.min.js',
    'public/js/plugins/bootstrap-notify.js',
    'public/js/plugins/bootstrap-selectpicker.js',
    'public/js/lib/jquery.fancybox.min.js',
    'public/js/lib/bootstrap-filestyle.min.js',
    'public/js/lib/Sortable.min.js',
], 'public/js/admin/libraries.js');


mix.sass('resources/sass/public/style.scss', 'public/css/main.css').options({
    autoprefixer: {
        options: {
            browsers: [
                'last 6 versions',
            ]
        }
    }
});
mix.js('resources/js/public/index.js', 'public/js/main.js');
