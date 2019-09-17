// const mix = require('laravel-mix');
//
// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for the application as well as bundling up all the JS files.
//  |
//  */
//
// mix.js('resources/js/app.js', 'public/js')
//     .extract([
//     'jquery',
//     'bootstrap',
//     'swiper'
//     ], 'js/vendor')
//
// mix.js('resources/js/admin/admin.js', 'public/admin/js')
//
// mix.sass('resources/sass/app.scss', 'public/css').sass('resources/sass/admin/app.scss', 'public/admin/css');
//
// mix.copyDirectory('resources/assets/fonts', 'public/fonts');

if (['customers', 'backoffice'].includes(process.env.npm_config_section)) {
    require(`${__dirname}/webpack.${process.env.npm_config_section}.mix.js`)
} else {
    console.log(
        '\x1b[41m%s\x1b[0m',
        'Provide correct --section argument to build command: customers, backoffice'
    )
    throw new Error('Provide correct --section argument to build command!')
}
