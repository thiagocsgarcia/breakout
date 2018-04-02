
const gulp = require('gulp');
const elixir = require('laravel-elixir');
const webpack = require('webpack');
const WebpackDevServer = require('webpack-dev-server');
const webpackConfig = require('./webpack.config');
const webpackDevConfig = require('./webpack.dev.config'); 

require('laravel-elixir-vue');
require('laravel-elixir-webpack-official');

Elixir.webpack.config.module.loaders = [];

Elixir.webpack.mergeConfig(webpackConfig);
Elixir.webpack.mergeConfig(webpackDevConfig);


gulp.task('webpack-dev-server', () => {

    let config = Elixir.webpack.config;

    new WebpackDevServer(webpack(config), {

        proxy: {
            '*': 'http://127.0.0.1:8000'
        },
        watchOption: {
            poll: true,
            agregatteTimeOut: 300
        },
        publicPath: config.output.publicPath,
        noInfo: true,
        stats: {colors:true}

    }).listen(8080, "127.0.0.1", () => {
        console.log("Bundling Project ....");
    });

});

elixir(function (mix) {
    mix.sass('./resources/assets/admin/sass/admin.scss')
        .copy('./node_modules/materialize-css/dist/fonts/roboto','./public/fonts/roboto');

    gulp.start('webpack-dev-server');

    mix.browserSync({
        host: '127.0.0.1',
        proxy: 'http://127.0.0.1:8080'
    });
});