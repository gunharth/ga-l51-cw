<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="/" class="navbar-brand">Goldader</a>
          @if(Auth::check())
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          @endif
        </div>
        @if(Auth::check())
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
              <a href="{{ route('medium.index') }}">Medium</a>
            </li>
            <!--<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Medium <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                
                <li><a href="{{ route('medium.index') }}">Alle</a></li>
                <li><a href="{{ route('medium.index') }}">Running & Fitness</a></li>
                <li><a href="#">Medium X</a></li>
                <li><a href="#">Medium Y</a></li>
                <li><a href="#">Medium Z</a></li>
                <li><a href="#">...</a></li>
              </ul>
            </li>-->
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
            <!--<li><a href="#">Konto</a></li>-->
            <li><a href="#">{{ Auth::user()->name }}</a></li>
            <li><a href="/auth/logout">Abmelden</a></li>
          </ul>

        </div>
        @endif
      </div>
    </div>