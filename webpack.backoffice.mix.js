const mix = require('laravel-mix');
require('laravel-mix-merge-manifest')


mix.js('resources/js/admin/includes/gproducts.js', 'public/admin/js/includes/gproducts.js')
    .js('resources/js/admin/admin.js', 'public/admin/js')
    .extract([
        'jquery',
        'bootstrap'
    ])
    .sass('resources/sass/admin/app.scss', 'public/admin/css')
    .mergeManifest();
