<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('pagetitle')</title>
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="fuelux">
    @include('partials/nav')
    <div class="container">
      @include('partials.errors')
      @if(Session::has('flash_message'))
          <div id="flashMessage">
          <div class="alert alert-success">
              {{ Session::get('flash_message') }}
          </div>
          </div>
      @endif
      @yield('content')
    </div>
    <!--footer-->
      <div class="container">
        <p><small><em>Goldader v 0.2 - © <?php echo date('Y');?> - Gunharth Randolf / communautic Group</em></small></p>
      </div>
    
    @include('partials/modal')
    <script src="{{ elixir('js/app.js') }}"></script>
  </body>
</html>