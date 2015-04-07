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
              <div class="row margin-bottom-30">
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
                <!-- END CAROUSEL -->

                <!-- BEGIN PORTFOLIO DESCRIPTION -->
                <div class="col-md-7">
                  @if($item->subtitle)
                  <h2>{{$item->subtitle}}</h2>
                  @endif
                  @if($item->description)
                  <p>{{$item->description}}</p>
                  @endif
                  <br>
                </div>
                <!-- END PORTFOLIO DESCRIPTION -->
              </div>

              <div class="row quote-v1 margin-bottom-30">
                <div class="col-md-7 quote-v1-inner">
                  <span>Lorem ipsum dolor sit amet, consectetuer adipiscing tempor</span>
                </div>
                <div class="col-md-5 quote-v1-inner text-right">
                  <a href="#" class="btn-transparent"><i class="fa fa-rocket margin-right-10"></i>Adipiscing</a>
                  <a href="#" class="btn-transparent"><i class="fa fa-gift margin-right-10"></i>Get it FREE</a>
                </div>
              </div>

        <!-- BEGIN RECENT WORKS -->
        <div class="row recent-work margin-bottom-40">
          <div class="col-md-3">
            <h2><a href="portfolio.html">{{ucwords(Lang::get('site.recent_works'))}}</a></h2>
          </div>
          <div class="col-md-9">
            <div class="owl-carousel owl-carousel3">
              @foreach($recent as $ritem)
              <div class="recent-work-item">
                <em>
                  <img src="/uploads/images/3_{{$ritem->main_image->url}}" alt="Amazing Project" class="img-responsive">
                  <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                  <a href="/themes/bootstrap/assets/frontend/pages/img/works/img1.jpg" class="fancybox-button" title="Project Name #1" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>Amazing Project</strong>
                  <b>Agenda corp.</b>
                </a>
              </div>
              @endforeach
              <div class="recent-work-item">
                <em>
                  <img src="/themes/bootstrap/assets/frontend/pages/img/works/img2.jpg" alt="Amazing Project" class="img-responsive">
                  <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                  <a href="/themes/bootstrap/assets/frontend/pages/img/works/img2.jpg" class="fancybox-button" title="Project Name #2" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>Amazing Project</strong>
                  <b>Agenda corp.</b>
                </a>
              </div>
              <div class="recent-work-item">
                <em>
                  <img src="/themes/bootstrap/assets/frontend/pages/img/works/img3.jpg" alt="Amazing Project" class="img-responsive">
                  <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                  <a href="/themes/bootstrap/assets/frontend/pages/img/works/img3.jpg" class="fancybox-button" title="Project Name #3" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>Amazing Project</strong>
                  <b>Agenda corp.</b>
                </a>
              </div>
              <div class="recent-work-item">
                <em>
                  <img src="/themes/bootstrap/assets/frontend/pages/img/works/img4.jpg" alt="Amazing Project" class="img-responsive">
                  <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                  <a href="/themes/bootstrap/assets/frontend/pages/img/works/img4.jpg" class="fancybox-button" title="Project Name #4" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>Amazing Project</strong>
                  <b>Agenda corp.</b>
                </a>
              </div>
              <div class="recent-work-item">
                <em>
                  <img src="/themes/bootstrap/assets/frontend/pages/img/works/img5.jpg" alt="Amazing Project" class="img-responsive">
                  <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                  <a href="/themes/bootstrap/assets/frontend/pages/img/works/img5.jpg" class="fancybox-button" title="Project Name #5" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>Amazing Project</strong>
                  <b>Agenda corp.</b>
                </a>
              </div>
              <div class="recent-work-item">
                <em>
                  <img src="/themes/bootstrap/assets/frontend/pages/img/works/img6.jpg" alt="Amazing Project" class="img-responsive">
                  <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                  <a href="/themes/bootstrap/assets/frontend/pages/img/works/img6.jpg" class="fancybox-button" title="Project Name #6" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>Amazing Project</strong>
                  <b>Agenda corp.</b>
                </a>
              </div>
              <div class="recent-work-item">
                <em>
                  <img src="/themes/bootstrap/assets/frontend/pages/img/works/img3.jpg" alt="Amazing Project" class="img-responsive">
                  <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                  <a href="/themes/bootstrap/assets/frontend/pages/img/works/img3.jpg" class="fancybox-button" title="Project Name #3" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>Amazing Project</strong>
                  <b>Agenda corp.</b>
                </a>
              </div>
              <div class="recent-work-item">
                <em>
                  <img src="/themes/bootstrap/assets/frontend/pages/img/works/img4.jpg" alt="Amazing Project" class="img-responsive">
                  <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                  <a href="/themes/bootstrap/assets/frontend/pages/img/works/img4.jpg" class="fancybox-button" title="Project Name #4" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>Amazing Project</strong>
                  <b>Agenda corp.</b>
                </a>
              </div>
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
        Layout.initTwitter();
        Layout.initOWL();
    });
</script>
@endsection