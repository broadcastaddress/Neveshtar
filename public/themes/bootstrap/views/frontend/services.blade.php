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
                <div class="col-md-7">
					@if($item->subtitle)
					<h2>{{$item->subtitle}}</h2>
					@endif
					@if($item->intro)
					<p><strong>{{$item->intro}}</strong></p>
					@endif
					@if($item->quote)
					<blockquote>
					<p>{{$item->quote}}</p>
					<small>{{$item->quote_author}}</small>
					</blockquote>
					@endif
					<p>{!!$item->description!!}</p>
                </div>
                <!-- END SERVICE BLOCKS -->

                <!-- BEGIN CAROUSEL AND TESTIMONIALS -->
                <div class="col-md-5">
				  @if((isset($item->main_image->url)) || (count($item->gallery) > 0))
                  <div class="front-carousel">
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
                  </div>
                  @endif

                <!-- BEGIN TESTIMONIALS -->
                <div class="testimonials-v1 testimonials-v1-another-color">
                <br/>
                  <h2>Clients Testimonials</h2>
                  <div id="myCarousel1" class="carousel slide">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                      <div class="active item">
                        <blockquote><p>Denim you probably haven't heard of. Lorem ipsum dolor met consectetur adipisicing sit amet, consectetur adipisicing elit, of them jean shorts sed magna aliqua. Lorem ipsum dolor met consectetur adipisicing sit amet do eiusmod dolore.</p></blockquote>
                        <div class="carousel-info">
                          <img class="pull-left" src="/themes/bootstrap/assets/frontend/pages/img/people/img1-small.jpg" alt="">
                          <div class="pull-left">
                            <span class="testimonials-name">Lina Mars</span>
                            <span class="testimonials-post">Commercial Director</span>
                          </div>
                        </div>
                      </div>
                      <div class="item">
                        <blockquote><p>Raw denim you Mustache cliche tempor, williamsburg carles vegan helvetica probably haven't heard of them jean shorts austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p></blockquote>
                        <div class="carousel-info">
                          <img class="pull-left" src="/themes/bootstrap/assets/frontend/pages/img/people/img5-small.jpg" alt="">
                          <div class="pull-left">
                            <span class="testimonials-name">Kate Ford</span>
                            <span class="testimonials-post">Commercial Director</span>
                          </div>
                        </div>
                      </div>
                      <div class="item">
                        <blockquote><p>Reprehenderit butcher stache cliche tempor, williamsburg carles vegan helvetica.retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.</p></blockquote>
                        <div class="carousel-info">
                          <img class="pull-left" src="/themes/bootstrap/assets/frontend/pages/img/people/img2-small.jpg" alt="">
                          <div class="pull-left">
                            <span class="testimonials-name">Jake Witson</span>
                            <span class="testimonials-post">Commercial Director</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Carousel nav -->
                    <a class="left-btn" href="#myCarousel1" data-slide="prev"></a>
                    <a class="right-btn" href="#myCarousel1" data-slide="next"></a>
                  </div>
                </div>
                <!-- END TESTIMONIALS -->
                </div>
                <!-- END BEGIN VIDEO AND TESTIMONIALS -->
              </div>
            </div>
          </div>
        </oiv>
      </div>
    </div>
@endsection

@section('headerPlugins')
<link href="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
<link href="/themes/bootstrap/assets/frontend/pages/css/gallery.css" rel="stylesheet">
@endsection

@section('footerPlugins')
<script src="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="/themes/bootstrap/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
    });
</script>
@endsection