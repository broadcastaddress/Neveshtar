<!-- Body BEGIN -->
<body class="corporate">
    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+98(935)402-402-1</span></li>
                        <li><i class="fa fa-envelope-o"></i><span>info@neveshtar.com</span></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
						@if (Auth::guest())
							<li><a href="/{{Lang::getLocale()}}/auth/login">Login</a>
							<li><a href="/{{Lang::getLocale()}}/auth/login?register">Register</a></li>
						@else
                        <li class="langs-block dropdown">
                            <a href="/profile" class="current"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                            <div class="langs-block-others-wrapper"><div class="langs-block-others">
                              <a href="/{{Lang::getLocale()}}/auth/logout"><i class="fa fa-times-circle-o"></i> Logout</a>
                            </div></div>
                        </li>
						@endif
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>
    </div>
    <!-- END TOP BAR -->
    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="/{{Lang::getLocale()}}">Neveshtar.com</a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
          <ul>
          	@if(Route::currentRouteName() == 'WelcomeController')
            <li class="active">
            @else
            <li>
            @endif
              <a data-target="/{{Lang::getLocale()}}" href="/{{Lang::getLocale()}}">
                Home
              </a>
            </li>
            @foreach($navigation as $menu)
            @if((Request::segment(2)) == $menu->slug)
            @if(count($menu['children']) > 0)
            <li class="dropdown active">
            @else
            <li class="active">
            @endif
            @else
            @if(count($menu['children']) > 0)
            <li class="dropdown">
            @else
            <li>
            @endif
            @endif
            	@if(count($menu['children']) > 0)
	            	<a class="dropdown-toggle disabled" data-toggle="dropdown" data-target="#" href="/{{Lang::getLocale()}}/c/{{$menu->slug}}">
	            		{{ucwords($menu->title)}}
            		</a>
	            	<ul class="dropdown-menu">
		            @foreach($menu['children'] as $child)
		           		<li><a href="/{{Lang::getLocale()}}/c/{{$child->slug}}">{{ $child->title }}</a></li>
		            @endforeach
	            	</ul>
            	@else
            	<a href="/{{Lang::getLocale()}}/c/{{$menu->slug}}">{{ucwords($menu->title)}}</a>
            	@endif
        	</li>
            @endforeach
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Pages
              </a>
              <ul class="dropdown-menu">
                <li><a href="/about">About Us</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/portfolio">Portfolio</a></li>
                <li><a href="/prices">Prices</a></li>
                <li><a href="/faq">FAQ</a></li>
                <li><a href="/gallery">Gallery</a></li>
                <li><a href="/search">Search Result</a></li>
                <li><a href="/careers">Careers</a></li>
                <li><a href="/sitemap">Site Map</a></li>
              </ul>
            </li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/admin" target="_blank">Admin</a></li>

            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div>
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->