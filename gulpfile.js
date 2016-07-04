var elixir = require('laravel-elixir');

require('./resources/elixir-extensions/elixir-uglify');

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

elixir(function (mix) {
    // PowerManagement
    mix.less('adminlte/AdminLTE.less', 'public/assets/power-m/css/app.min.css', {compress: true})
       .less('adminlte/skins/skin-purple.less', 'public/assets/power-m/css/all-skins.min.css', {compress: true})
       .less('bootstrap-less/bootstrap.less', 'public/assets/common/css/bootstrap.min.css', {compress: true})
       .scripts(['app.js', 'plugins/jquery.slimscroll.min.js'], 'public/assets/power-m/js/app.js')
       .uglify('public/assets/power-m/js/app.js', 'public/assets/power-m/js');

    mix.version([
        'assets/power-m/css/app.min.css',
        'assets/power-m/css/all-skins.min.css',
        'assets/power-m/js/app.min.js',
        'assets/common/css/bootstrap.min.css'
    ]);
});
