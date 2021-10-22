const mix = require('laravel-mix');

mix.scripts([
    'resources/frontend/js/jquery.min.js',
    'resources/frontend/js/bootstrap.min.js',
    'resources/frontend/js/nifty.min.js',
    'resources/frontend/js/demo/nifty-demo.min.js',
    'resources/frontend/plugins/flot-charts/jquery.flot.min.js',
    'resources/frontend/plugins/flot-charts/jquery.flot.resize.min.js',
    'resources/frontend/plugins/flot-charts/jquery.flot.tooltip.min.js',
    'resources/frontend/plugins/sparkline/jquery.sparkline.min.js',
    'resources/frontend/js/demo/dashboard.js',
    'resources/frontend/plugins/pace/pace.min.js',
], 'public/js/main.js')
    .styles([
    'resources/frontend/css/bootstrap.min.css',
    'resources/frontend/css/nifty.min.css',
    'resources/frontend/css/demo/nifty-demo-icons.min.css',
    'resources/frontend/plugins/pace/pace.min.css',
    'resources/frontend/css/demo/nifty-demo.min.css',
], 'public/css/main.css')
    .js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

if (mix.inProduction()) {
    mix.version();
}
