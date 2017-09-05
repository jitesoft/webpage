const elixir = require('laravel-elixir');

elixir(function(mix) {

    mix.sass(['site/*.scss'], 'public/css/site.css');
    mix.sass(['admin/*.scss'], 'public/css/admin.css');
    mix.sass(['login/*.scss'], 'public/css/login.css');

    mix.webpack(['site/*.js'], 'public/js/site.js');
    mix.webpack(['admin/*.js'], 'public/js/admin.js');
});
