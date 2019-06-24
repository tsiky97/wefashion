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

mix.js('resources/assets/js/app.js', 'public/js')
	.js('resources/assets/js/confirm.js', 'public/js')
    .js('resources/assets/js/preview-picture.js', 'public/js')
    .less('resources/assets/css/app-complement.less', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .browserSync({
    	proxy: 'localhost: 8000',
    	files: [
    		'app/**/*.php',
    		'resources/views/**/*.php',
    		'public/assets/js/**/*.js',
    		'public/assets/css/**/*.css'
    	]
    });
