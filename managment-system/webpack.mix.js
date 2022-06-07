const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.js('resources/js/users_managment/users_managment.js', 'public/js/users_managment')
mix.js('resources/js/subjects_managment/subjects_managment.js', 'public/js/subjects_managment')
mix.js('resources/js/courses_managment/courses_managment.js', 'public/js/courses_managment')
mix.js('resources/js/exams_managment/exams_managment.js', 'public/js/exams_managment')
mix.js('resources/js/exams_managment/user_has_exams.js', 'public/js/exams_managment')
