<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('pagetitle')</title>
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="fuelux">
    @include('partials/nav')
    <div class="container-fluid">
      @include('partials.errors')
      @if(Session::has('flash_message'))
          <div id="flashMessage">
          <div class="alert alert-success">
              {{ Session::get('flash_message') }}
          </div>
          </div>
      @endif
      @yield('content')
    
    <!--footer-->
      
        <p>&nbsp;</p>
        <p><small><em>Goldader v 0.2 - © <?php echo date('Y');?> - Gunharth Randolf / communautic Group</em></small></p>
      </div>
    
    @include('partials/modal')
    <script src="{{ elixir('js/app.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
  
  /*$(function () {
  // data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type
  var tax_data = [
       {"period": "2011 Q3", "licensed": 3407, "sorned": 660},
       {"period": "2011 Q2", "licensed": 3351, "sorned": 629},
       {"period": "2011 Q1", "licensed": 3269, "sorned": 618},
       {"period": "2010 Q4", "licensed": 3246, "sorned": 661},
       {"period": "2009 Q4", "licensed": 3171, "sorned": 676},
       {"period": "2008 Q4", "licensed": 3155, "sorned": 681},
       {"period": "2007 Q4", "licensed": 3226, "sorned": 620},
       {"period": "2006 Q4", "licensed": 3245, "sorned": null},
       {"period": "2005 Q4", "licensed": 3289, "sorned": null}
  ];
  Morris.Line({
    element: 'hero-graph',
    data: tax_data,
    xkey: 'period',
    ykeys: ['licensed', 'sorned'],
    labels: ['Licensed', 'Off the road']
  });

  Morris.Donut({
    element: 'hero-donut',
    data: [
      {label: 'Jam', value: 25 },
      {label: 'Frosted', value: 40 },
      {label: 'Custard', value: 25 },
      {label: 'Sugar', value: 10 }
    ],
    formatter: function (y) { return y + "%" }
  });

  Morris.Area({
    element: 'hero-area',
    data: [
      {period: '2010 Q1', iphone: 2666, ipad: null, itouch: 2647},
      {period: '2010 Q2', iphone: 2778, ipad: 2294, itouch: 2441},
      {period: '2010 Q3', iphone: 4912, ipad: 1969, itouch: 2501},
      {period: '2010 Q4', iphone: 3767, ipad: 3597, itouch: 5689},
      {period: '2011 Q1', iphone: 6810, ipad: 1914, itouch: 2293},
      {period: '2011 Q2', iphone: 5670, ipad: 4293, itouch: 1881},
      {period: '2011 Q3', iphone: 4820, ipad: 3795, itouch: 1588},
      {period: '2011 Q4', iphone: 15073, ipad: 5967, itouch: 5175},
      {period: '2012 Q1', iphone: 10687, ipad: 4460, itouch: 2028},
      {period: '2012 Q2', iphone: 8432, ipad: 5713, itouch: 1791}
    ],
    xkey: 'period',
    ykeys: ['iphone', 'ipad', 'itouch'],
    labels: ['iPhone', 'iPad', 'iPod Touch'],
    pointSize: 2,
    hideHover: 'auto'
  });

  Morris.Bar({
    element: 'hero-bar',
    data: [
      {device: 'iPhone', geekbench: 136},
      {device: 'iPhone 3G', geekbench: 137},
      {device: 'iPhone 3GS', geekbench: 275},
      {device: 'iPhone 4', geekbench: 380},
      {device: 'iPhone 4S', geekbench: 655},
      {device: 'iPhone 5', geekbench: 1571}
    ],
    xkey: 'device',
    ykeys: ['geekbench'],
    labels: ['Geekbench'],
    barRatio: 0.4,
    xLabelAngle: 35,
    hideHover: 'auto'
  });

  new Morris.Line({
    element: 'examplefirst',
    xkey: 'year',
    ykeys: ['value'],
    labels: ['Value'],
    data: [
      {year: '2008', value: 20},
      {year: '2009', value: 10},
      {year: '2010', value: 5},
      {year: '2011', value: 5},
      {year: '2012', value: 20}
    ]
  });
});*/

</script>
  </body>
</html>