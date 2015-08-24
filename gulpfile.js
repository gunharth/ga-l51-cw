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
 var bowerDirBootstrap = "vendor/bower_components/bootstrap-sass-official/assets/";
 var bowerDirBootswatch = "vendor/bower_components/bootswatch-sass";
 var bowerDirFontawesome = "vendor/bower_components/fontawesome/";
 // javascript paths
 var bowerDirJquery = "vendor/bower_components/jquery/dist/";

elixir(function(mix) {
     mix.sass('app.scss')
         // copy relevant files to the resources folder.  This is the css
         .copy(bowerDirBootstrap, 'resources/assets/sass/bootstrap')
         .copy(bowerDirBootstrap + 'fonts/bootstrap', 'public/fonts')
         .copy(bowerDirBootswatch, 'resources/assets/sass/bootswatch')
         .copy(bowerDirFontawesome + 'scss', 'resources/assets/sass/fontawesome')
         .copy(bowerDirFontawesome + 'fonts', 'public/fonts')
         // this is the javascript
         .copy(bowerDirJquery + 'jquery.js', 'resources/assets/js/jquery.js')
         .copy(bowerDirBootstrap + 'javascripts/bootstrap.js',
         'resources/assets/js/bootstrap.js')
     //
     // Combine scripts
     //
     mix.scripts([
             'js/jquery.js',
             'js/bootstrap.js',
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
