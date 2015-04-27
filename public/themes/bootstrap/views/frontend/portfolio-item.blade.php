@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">{{$title}}</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>{{$title}}</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN CAROUSEL -->
				  @if((isset($item->main_image->url)) || (count($item->gallery) > 0))
                  <div class="col-md-5 front-carousel">
                    <div class="carousel slide" id="myCarousel" data-interval="false">
                      <!-- Carousel items -->
                      <div class="carousel-inner">
                      	<?php $i = 0; ?>
                      	@if(isset($item->main_image->url))
                      	<?php $i++; ?>
						<div class="gallery-item item active">
							<a class="fancybox-button" title="{{$item->main_image->title}}" rel="group" href="/uploads/images/{{$item->main_image->url}}">
								<img alt="{{$item->main_image->title}}" src="/uploads/images/3_{{$item->main_image->url}}">
								<span class="carousel-caption row-fluid">
									<p>{{$item->main_image->title}}</p>
								</span>
								<div class="zoomix"><i class="fa fa-search"></i></div>
							</a>
						</div>
                        @endif
                        @if(count($item->gallery) > 0)
                        @foreach($item->gallery as $gallery)
                        @if(!isset($item->main_image->url) || ($gallery->url !== $item->main_image->url))
                        @if($i == 0)
                        <div class="gallery-item item active">
                        @else
                        <div class="gallery-item item">
                        @endif
							<a class="fancybox-button" title="{{$gallery->title}}" rel="group" href="/uploads/images/{{$gallery->url}}">
								<img alt="{{$gallery->title}}" src="/uploads/images/3_{{$gallery->url}}">
								<span class="carousel-caption row-fluid">
									<p>{{$gallery->title}}</p>
								</span>
								<div class="zoomix"><i class="fa fa-search"></i></div>
							</a>
						</div>
                        <?php $i++; ?>
                        @endif
                        @endforeach
                        @endif
                      </div>
                      <!-- Carousel nav -->
                      @if($i > 1)
                      <a data-slide="prev" href="#myCarousel" class="carousel-control left">
                        <i class="fa fa-angle-left"></i>
                      </a>
                      <a data-slide="next" href="#myCarousel" class="carousel-control right">
                        <i class="fa fa-angle-right"></i>
                      </a>
                      @endif
                    </div>
	                  @if($item->quote)
	                  <blockquote>
	                    <p>{{ucfirst($item->quote)}}</p>
	                    <small>{{ucwords($item->quote_author)}}</small>
	                  </blockquote>
	                  @endif
                  </div>
                  @endif
                <!-- END CAROUSEL -->

                <!-- BEGIN PORTFOLIO DESCRIPTION -->
                <div class="col-md-7">
                  @if($item->subtitle)
                  <h2>{{$item->subtitle}}</h2>
                  @endif
                  @if($item->intro)
                  <h4>{{$item->intro}}</h4>
                  @endif
                  @if($item->description)
                  <p>{!!$item->description!!}</p>
                  @endif
                </div>
                <!-- END PORTFOLIO DESCRIPTION -->
              </div>

              <hr/>

        <!-- BEGIN RECENT WORKS -->
        <div class="row recent-work margin-bottom-40">
          <div class="col-md-3">
            <h2>{{ucwords(Lang::get('site.recent_works'))}}</h2>
          </div>
          <div class="col-md-9">
            <div class="owl-carousel owl-carousel3">
              @foreach($recent as $ritem)
              <div class="recent-work-item">
                <em>
                  <img src="/uploads/images/c_{{$ritem->main_image->url}}" alt="{{$ritem->title}}" class="img-responsive">
                  <a href="/{{$ritem->language}}/{{$ritem->slug}}"><i class="fa fa-link"></i></a>
                  <a href="/uploads/images/{{$ritem->main_image->url}}" class="fancybox-button" title="{{$ritem->title}}" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>{{$ritem->title}}</strong>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <!-- END RECENT WORKS -->

            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- BEGIN SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection

@section('headerPlugins')
<link href="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
<link href="/themes/bootstrap/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="/themes/bootstrap/assets/frontend/pages/css/portfolio.css" rel="stylesheet">
<link href="/themes/bootstrap/assets/frontend/pages/css/gallery.css" rel="stylesheet">
@endsection

@section('footerPlugins')
<script src="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="/themes/bootstrap/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

<script src="/themes/bootstrap/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initOWL();
        Layout.initFixHeaderWithPreHeader();
    });
</script>
@endsection