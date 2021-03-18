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

mix.styles([
    'public/assets/css/bootstrap.min.css',
    'public/assets/css/bootstrap_limitless.min.css',
    'public/assets/css/layout.min.css',
    'public/assets/css/components.min.css',
    'public/assets/css/colors.min.css',
    'public/assets/plugins/toastr/toastr.min.css',
    'public/assets/plugins/cropper/cropper.min.css',
    // 'public/global_assets/css/extras/animate.css',
    // 'public/assets/plugins/icheck/skins/all.css'
], 'public/css/compiled.css');
mix.scripts([
    'public/global_assets/js/main/jquery-3.4.1.min.js',
    'public/global_assets/js/main/bootstrap.bundle.min.js',
    'public/global_assets/js/plugins/loaders/blockui.min.js',
    'public/global_assets/js/plugins/forms/styling/uniform.min.js',
    'public/global_assets/js/plugins/forms/styling/switchery.min.js',
    'public/global_assets/js/plugins/forms/styling/switch.min.js',
    'public/global_assets/js/plugins/tables/datatables/datatables.min.js',
    'public/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js',
    'public/global_assets/js/plugins/forms/validation/validate.min.js',
    'public/global_assets/js/plugins/notifications/jgrowl.min.js',
    'public/global_assets/js/plugins/notifications/noty.min.js',
    'public/global_assets/js/demo_pages/form_inputs.js',
    'public/global_assets/js/plugins/ui/moment/moment_locales.min.js',
    'public/global_assets/js/plugins/pickers/daterangepicker.js',
    'public/global_assets/js/plugins/pickers/pickadate/picker.js',
    'public/global_assets/js/plugins/pickers/pickadate/picker.date.js',
    'public/global_assets/js/demo_pages/datatables_responsive.js',
    'public/global_assets/js/plugins/notifications/sweet_alert.min.js',
    'public/global_assets/js/plugins/forms/selects/select2.min.js',
    'public/assets/plugins/cropper/cropper.min.js',
    'public/assets/plugins/toastr/toastr.min.js',
    'public/assets/plugins/AutoComplete/jquery-ui.js',
    'public/assets/plugins/loadingoverlay/loadingoverlay.min.js',
    // 'public/assets/plugins/icheck/icheck.min.js',
    'public/assets/js/app.js',
    'public/global_assets/js/main/axios.min.js',
    'public/assets/js/Metodos/General.js',
], 'public/css/compiled.js');