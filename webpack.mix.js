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

 // mix.styles('node_modules/bootstrap-select/dist/css/bootstrap-select.css','public/css/bootstrap-select.css');
   // mix.js('node_modules/bootstrap-select/dist/js/i18n/defaults-fa_IR.js', 'public/js/defaults-fa_IR.js');
  mix.css('resources/assets/css/a.css', 'public/css/a.css');
