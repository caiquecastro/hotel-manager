var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    var paths = {
        jquery: "vendor/bower_components/jquery/dist",
        bootstrap: "vendor/bower_components/bootstrap",
        fontawesome: "vendor/bower_components/font-awesome",
        jquery_mask: "vendor/bower_components/jquery-mask-plugin",
        mask_money: "vendor/bower_components/jquery-maskmoney",
        chart_js: "vendor/bower_components/Chart.js"
    };

    var components = [
        paths.bootstrap + "/scss",
        paths.fontawesome + "/scss"
    ];

    //Executes front-end related stuff
    mix.sass('app.scss', 'public/css/', { includePaths: components })
        .copy(paths.fontawesome + "/fonts", "public/fonts");

    mix.scripts([
        "../../../" + paths.jquery + "/jquery.js",
        "../../../" + paths.bootstrap + "/dist/js/bootstrap.js",
        "../../../" + paths.jquery_mask + "/dist/jquery.mask.min.js",
        "../../../" + paths.mask_money + "/dist/jquery.maskMoney.min.js",
        "../../../" + paths.chart_js + "/Chart.min.js",
        '/resources/assets/js/app.js'
    ]);

    //mix.browserSync();
});
