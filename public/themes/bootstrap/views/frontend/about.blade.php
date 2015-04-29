@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">About Us</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>{{$title}}</h1>
            <div class="content-page">
              <div class="row margin-bottom-30">
                <!-- BEGIN INFO BLOCK -->
                <div class="col-md-7">
                  <h2 class="no-top-space">{{$item->subtitle}}</h2>
                  <p>{{$item->intro}}</p>
                  <p>{!!$item->description!!}</p>
                  @if($item->quote)
                  <blockquote>
                    <p>{{ucfirst($item->quote)}}</p>
                    <small>{{ucwords($item->quote_author)}}</small>
                  </blockquote>
                  @endif
                </div>
                <!-- END INFO BLOCK -->

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
                  </div>
                  @endif

               <!-- BEGIN TESTIMONIALS -->
               @if(count($item->testimonials) > 0)
               <div class="col-md-5">
	                <div class="testimonials-v1">
	                  <h2>Clients Testimonials</h2>
	                  <div id="myCarousel1" class="carousel slide">
	                    <!-- Carousel items -->
	                    <div class="carousel-inner">
	                      <?php $i = 0; ?>
	                      @foreach($item->testimonials as $testimonial)
	                      <?php $i++; ?>
	                      @if ($i == 1)
	                      <div class="item active">
	                      @else
	                      <div class="item">
	                      @endif
	                        <blockquote><p>{{$testimonial->description}}</p></blockquote>
	                        <div class="carousel-info">
	                          <img class="pull-left" src="/uploads/images/c3_{{$testimonial->image->url}}" alt="">
	                          <div class="pull-left">
	                            <span class="testimonials-name">{{ucwords($testimonial->name)}}</span>
	                            <span class="testimonials-post">{{ucwords($testimonial->title)}}</span>
	                          </div>
	                        </div>
	                      </div>
	                      @endforeach
	                    </div>
	                    <!-- Carousel nav -->
	                    <a class="left-btn" href="#myCarousel1" data-slide="prev"></a>
	                    <a class="right-btn" href="#myCarousel1" data-slide="next"></a>
	                  </div>
	                </div>
               </div>
               @endif
                <!-- END TESTIMONIALS -->

                <!-- END CAROUSEL -->
              </div>

              @if(count($item->staff) > 0)
              <div class="row front-team">
                <ul class="list-unstyled">
                  @foreach($item->staff as $staff)
                  @if($staff->image)
                  <li class="col-md-3">
                    <div class="thumbnail">
                      <img alt="{{$staff->name}}" src="/uploads/images/c_{{$staff->image->url}}">
                      <h3>
                        <strong>{{$staff->name}}</strong>
                        @if($staff->title)
                        <small>{{ucwords($staff->title)}}</small>
                        @endif
                      </h3>
                      <p>{{ucfirst($staff->intro)}}</p>
                      <ul class="social-icons social-icons-color">
                        @if($staff->facebook)
                        <li><a class="facebook" target="_blank" data-original-title="Facebook" href="{{$staff->facebook}}"></a></li>
                        @endif
                        @if($staff->twitter)
                        <li><a class="twitter" target="_blank" data-original-title="Twitter" href="{{$staff->twitter}}"></a></li>
                        @endif
                        @if($staff->google_plus)
                        <li><a class="googleplus" target="_blank" data-original-title="Goole Plus" href="{{$staff->google_plus}}"></a></li>
                        @endif
                        @if($staff->linkedin)
                        <li><a class="linkedin" target="_blank" data-original-title="Linkedin" href="{{$staff->linkedin}}"></a></li>
                        @endif
                      </ul>
                    </div>
                  </li>
                  @endif
                  @endforeach
                </ul>
              </div>
              @endif

            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection

@section('headerPlugins')
{!! Minify::stylesheet('/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.css') !!}
{!! Minify::stylesheet('/themes/bootstrap/assets/frontend/pages/css/gallery.css') !!}
@endsection

@section('footerPlugins')
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/frontend/layout/scripts/layout.js') !!}
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initFixHeaderWithPreHeader();
    });
</script>
@endsection