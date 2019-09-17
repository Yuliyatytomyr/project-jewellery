const mix = require('laravel-mix');
require('laravel-mix-merge-manifest')


mix.js('resources/js/user/app.js', 'public/js')
    .extract([
        'jquery',
        'bootstrap',
        'swiper'
    ], 'js/vendor')
    .sass('resources/sass/app.scss', 'public/css')
    .mergeManifest();

mix.copyDirectory('resources/assets/fonts', 'public/fonts');