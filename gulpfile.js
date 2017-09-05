require('es6-promise').polyfill();
const elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.sass(['site/*.scss'], 'public/css/site.css');
    mix.sass(['admin/*.scss'], 'public/css/admin.css');
    mix.sass(['login/*.scss'], 'public/css/login.css');

    mix.webpack(['site/*.js'], 'public/js/site.js');
    mix.webpack(['admin/*.js'], 'public/js/admin.js');
});
