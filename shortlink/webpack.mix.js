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

mix.copy('resources/assets/js/jquery.datetimepicker.min.js', 'public/js/jquery.datetimepicker.min.js')
	.copy('resources/assets/css/jquery.datetimepicker.css', 'public/css/jquery.datetimepicker.css')
	.js('resources/assets/js/app.js', 'public/js')
	.sass('resources/assets/sass/external.scss', 'public/css')
	.sass('resources/assets/sass/app.scss', 'public/css');
