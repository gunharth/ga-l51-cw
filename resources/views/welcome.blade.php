<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Goldader</title>

    <!-- Bootstrap -->
  <link href="css/app.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.html" class="navbar-brand">Goldader</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Medium <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="medium.html">Running & Fitness</a></li>
                <li><a href="#">Medium X</a></li>
                <li><a href="#">Medium Y</a></li>
                <li><a href="#">Medium Z</a></li>
                <li><a href="#">...</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Aufträge <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="auftraege.html">Alle</a></li>
                <li><a href="medium.html">Running & Fitness</a></li>
                <li><a href="#">Medium X</a></li>
                <li><a href="#">Medium Y</a></li>
                <li><a href="#">Medium Z</a></li>
                <li><a href="#">...</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Kategorie <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="#">Zielgruppen</a></li>
                <li><a href="#">Kategorie X</a></li>
                <li><a href="#">Kategorie Y</a></li>
                <li><a href="#">Kategorie Z</a></li>
                <li><a href="#">...</a></li>
              </ul>
            </li>
            <!--<li>
              <a href="../help/">Help</a>
            </li>
            <li>
              <a href="http://news.bootswatch.com">Blog</a>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Yeti <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li><a href="http://jsfiddle.net/bootswatch/vdr1vx77/">Open Sandbox</a></li>
                <li class="divider"></li>
                <li><a href="./bootstrap.min.css">bootstrap.min.css</a></li>
                <li><a href="./bootstrap.css">bootstrap.css</a></li>
                <li class="divider"></li>
                <li><a href="./variables.less">variables.less</a></li>
                <li><a href="./bootswatch.less">bootswatch.less</a></li>
                <li class="divider"></li>
                <li><a href="./_variables.scss">_variables.scss</a></li>
                <li><a href="./_bootswatch.scss">_bootswatch.scss</a></li>
              </ul>
            </li>-->
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Konto</a></li>
            <li><a href="#" target="_blank">Abmelden</a></li>
          </ul>

        </div>
      </div>
    </div>
    
    <div class="container">

    <h1>Dashboard</h1>
    <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="medium.html" class="thumbnail">
        <img src="img/RUNN_COVER_2015_02-723x1024.jpg">
        <div class="caption">
            <h3>Running & Fitness</h3>
        </div>
        </a>
    </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <h3>Medium 2</h3>
            <p>Lorem ipsum dolor sit amet ... </p>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <h3>Medium 3</h3>
            <p>Lorem ipsum dolor sit amet ... </p>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <h3>Medium 4</h3>
            <p>Lorem ipsum dolor sit amet ... </p>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <h3>Medium 5</h3>
            <p>Lorem ipsum dolor sit amet ... </p>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <h3>Medium 6</h3>
            <p>Lorem ipsum dolor sit amet ... </p>
        </div>
    </div>
    <div class="well">
        <p>Dev notes:</p>
        <p>&nbsp;</p>
    </div>
  </div>

    <script src="js/app.js"></script>
  </body>
</html>