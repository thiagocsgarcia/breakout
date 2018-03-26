const elixir = require('laravel-elixir');
require('laravel-elixir-vue');


elixir(function (mix) {
    mix.sass('./resources/assets/admin/sass/admin.scss')
        .copy('./node_modules/materialize-css/dist/fonts/roboto','./public/fonts/roboto');

    mix.browserSync({
        host: '127.0.0.1',
        proxy: 'http://127.0.0.1:8000'
    });
});