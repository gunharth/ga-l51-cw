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

// create variables for paths for bootstrap and bootswatch
var bowerDir = "vendor/bower_components/";
var bowerDirBootstrap = "vendor/bower_components/bootstrap-sass-official/assets/";
var bowerDirBootswatch = "vendor/bower_components/bootswatch-sass";
var bowerDirFontawesome = "vendor/bower_components/fontawesome/";
// javascript paths
var bowerDirJquery = "vendor/bower_components/jquery/dist/";
var bowerDirJqueryUI = "vendor/bower_components/jquery-ui/";



elixir(function(mix) {
     mix.browserSync({
         //online: false,
         proxy : 'goldader.dev'
   });


     mix.sass('app.scss')
         // copy relevant files to the resources folder.  This is the css
         .copy(bowerDirBootstrap, 'resources/assets/sass/bootstrap')
         .copy(bowerDirBootstrap + 'fonts/bootstrap', 'public/fonts')
         .copy(bowerDirBootswatch, 'resources/assets/sass/bootswatch')
         .copy(bowerDirFontawesome + 'scss', 'resources/assets/sass/fontawesome')
         .copy(bowerDirFontawesome + 'fonts', 'public/fonts')
         .copy(bowerDir + 'fullcalendar/dist/fullcalendar.css', 'public/css/fullcalendar.css')
         //.copy(bowerDir + 'fullcalendar-scheduler/dist/scheduler.css', 'public/css/fullcalendar-scheduler.css')
         .copy(bowerDir + 'qtip2/jquery.qtip.css', 'resources/assets/css/jquery.qtip.css')
         // this is the javascript
         .copy(bowerDirJquery + 'jquery.js', 'resources/assets/js/jquery.js')
         .copy(bowerDirJqueryUI + 'jquery-ui.js', 'resources/assets/js/jquery-ui.js')
         .copy(bowerDirBootstrap + 'javascripts/bootstrap.js', 'resources/assets/js/bootstrap.js')
         .copy(bowerDir + 'moment/moment.js', 'resources/assets/js/moment.js')
         .copy(bowerDir + 'fullcalendar/dist/fullcalendar.js', 'public/js/fullcalendar.js')
         //.copy(bowerDir + 'fullcalendar-yearview/dist/fullcalendar.js', 'resources/assets/js/fullcalendar.js')
         //.copy(bowerDir + 'fullcalendar/dist/lang/de-at.js', 'public/js/fullcalendar-de.js')
         //.copy(bowerDir + 'fullcalendar-yearview/dist/lang/de-at.js', 'resources/assets/js/fullcalendar-de.js')
         .copy(bowerDir + 'fullcalendar-scheduler/dist/scheduler.js', 'public/js/fullcalendar-scheduler.js')
         .copy(bowerDir + 'qtip2/jquery.qtip.js', 'resources/assets/js/jquery.qtip.js')

    mix.styles([
         'resources/assets/css/bootstrap-datepicker.css',
         'resources/assets/css/dataTables.bootstrap.css',
         'resources/assets/css/buttons.bootstrap.css',
         //'resources/assets/css/fullcalendar.css',
         //'resources/assets/css/fullcalendar-scheduler.css',
         'resources/assets/css/jquery.qtip.css',
         'public/css/app.css'
      ],
         'public/css/app.css',
         './'
        );
     //
     // Combine scripts
     //

     mix.scripts([
             'js/jquery.js',
             'js/jquery-ui.js',
             'js/moment.js',
             //'js/fullcalendar.js',
             //'js/fullcalendar-de.js',
             //'js/fullcalendar-scheduler.js',
             'js/jquery.qtip.js',
             'js/bootstrap.js',
             'js/bootstrap-datepicker.js',
             'js/bootstrap-datepicker.de.js',
             'js/datatables/jszip.js',
             'js/datatables/pdfmake.js',
             'js/datatables/vfs_fonts.js',
             'js/datatables//jquery.dataTables.js',
            'js/datatables/dataTables.bootstrap.js',
            'js/datatables/dataTables.buttons.js',
            'js/datatables/buttons.bootstrap.js',
            'js/datatables/buttons.html5.js',
            'js/datatables/buttons.print.js',
            'js/datatables/buttons.colVis.min.js',
            'js/datatables/buttons.flash.min.js',
            'js/jquery.peity.min.js',
             'js/app.js'
         ],
         'public/js/app.js',
         'resources/assets'
     );
     mix.version([
            'css/app.css',
            'js/app.js'
        ])

 });
