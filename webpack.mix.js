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

mix.js([
      'resources/js/app.js',
      'resources/js/model_admin.js'] , 'public/js')
   .styles('node_modules/selectize/dist/css/selectize.css', 'public/css/selectize.css')
   .sass('resources/sass/app.scss', 'public/css')
   .autoload({
      jquery: ["$", "window.jQuery"],
      axios: ["axios"]
   });
