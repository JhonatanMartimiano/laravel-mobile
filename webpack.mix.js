const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.disableNotifications()
    .styles([
        'resources/views/admin/css/style.css',
        'resources/views/admin/assets/toast-master/css/jquery.toast.css',
        'resources/views/admin/assets/datatables/datatables.min.css',
    ], 'public/admin/css/style.css')
    .scripts([
        'resources/views/admin/assets/jquery/jquery-3.2.1.min.js',
        'resources/views/admin/assets/popper/popper.min.js',
        'resources/views/admin/assets/bootstrap/dist/js/bootstrap.min.js',
        'resources/views/admin/assets/bootstrap-toggle-master/js/bootstrap-toggle.min.js',
        'resources/views/admin/assets/datatables/datatables.min.js',
        'resources/views/admin/assets/datatables/Buttons-1.6.1/js/buttons.print.min.js',
        'resources/views/admin/assets/jquery.mask.min.js',
        'resources/views/admin/assets/jquery.form.js',
        'resources/views/admin/assets/toast-master/js/jquery.toast.js',
        'resources/views/admin/assets/perfect-scrollbar.jquery.min.js',
        'resources/views/admin/assets/waves.js',
        'resources/views/admin/js/script.js',

    ], 'public/admin/js/script.js')
    .version();
