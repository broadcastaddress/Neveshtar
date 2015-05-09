<!-- Body BEGIN -->
<body class="corporate">
    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                    	@if(isset($site_settings->main_telephone))
                        <li><i class="fa fa-phone"></i><span><a href="tel:{{$site_settings->main_telephone}}">{{$site_settings->main_telephone}}</a></span></li>
                        @endif
                    	@if(isset($site_settings->main_email))
                        <li><i class="fa fa-envelope-o"></i><span><a href="mailto:{{$site_settings->main_email}}">{{$site_settings->main_email}}</a></span></li>
                        @endif
                        <li class="langs-block list-unstyled list-inline">
                            <a href="" class="current">{{$site_language->name}} </a>
                            <div class="langs-block-others-wrapper"><div class="langs-block-others">
                              @foreach($site_languages as $language)
                              <a href="/{{$language->language}}">{{ucwords($language->name)}}</a>
                              @endforeach
                            </div></div>
                        </li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
						@if (Auth::guest())
							<li><a href="/{{Lang::getLocale()}}/auth/login">{{ucwords(Lang::get('site.login'))}}</a>
							<li><a href="/{{Lang::getLocale()}}/auth/login?register">{{ucwords(Lang::get('site.register'))}}</a></li>
						@else
                        <li class="langs-block dropdown">
                            <a href="/{{Lang::getLocale()}}/profile" class="current"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                            <div class="langs-block-others-wrapper"><div class="langs-block-others">
                              <a href="/{{Lang::getLocale()}}/profile"><i class="fa fa-user"></i> {{ucwords(Lang::get('site.profile'))}}</a>
                              <a href="/{{Lang::getLocale()}}/auth/logout"><i class="fa fa-times-circle-o"></i> {{ucwords(Lang::get('site.logout'))}}</a>
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
        <a class="site-logo" href="/{{Lang::getLocale()}}">{{$site_settings->site_title}}</a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-{{$site_language->opposite_direction}} font-transform-inherit">
          <ul>
          	@if(Route::currentRouteName() == 'WelcomeController')
            <li class="active">
            @else
            <li>
            @endif
              <a data-target="/{{Lang::getLocale()}}" href="/{{Lang::getLocale()}}">
                {{ucwords(Lang::get('site.home'))}}
              </a>
            </li>

            @foreach($site_navigation as $menu)
            @if(urldecode(Request::segment(2)) == $menu->slug || urldecode(Request::segment(3)) == $menu->slug)
            @if((count($menu['children']) > 0) && ($menu->type == "category"))
            <li class="dropdown active">
            @else
            <li class="active">
            @endif
            @else
            @if((count($menu['children']) > 0) && ($menu->type == "category"))
            <li class="dropdown">
            @else
            <li>
            @endif
            @endif
            	@if((count($menu['children']) > 0) && ($menu->type == "category"))
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
            <li><a href="/{{Lang::getLocale()}}/contact">{{ucwords(Lang::get('site.contact'))}}</a></li>

            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="{{ucwords(Lang::get('site.search'))}}" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">{{ucwords(Lang::get('site.search'))}}</button>
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