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

mix.combine([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/jquery-ui-dist/jquery-ui.js',
    'resources/assets/auth/auth.js',
], 'public/js/auth.js')
    .sass('resources/assets/app/app.scss', 'public/css')
    .sass('resources/assets/auth/auth.scss', 'public/css');