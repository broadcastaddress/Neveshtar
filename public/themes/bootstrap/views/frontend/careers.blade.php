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
          <div class="col-md-9 col-sm-9">
            <h1>{{$title}}</h1>
            <div class="content-page">
              <!-- BEGIN CAROUSEL -->
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
            <!-- END CAROUSEL -->

                    <!-- BEGIN INFO BLOCK -->
                    @if($item->subtitle)
                    <h2>{{$item->subtitle}}</h2>
                    @endif
                    @if($item->intro)
                    <p><strong>{{$item->intro}}</strong></p>
                    @endif
                    @if($item->description)
                    <p>{!!$item->description!!}</p>
                    @endif
                    <!-- END INFO BLOCK -->

                    <h2>Our positions</h2>
                    <div id="accordion1" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1">
                                    Senior Software Engineer
                                    </a>
                                </h4>
                            </div>
                            <div style="height: 0px;" id="accordion1_1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class="lead">Metronic is seeking an experienced.</p>

                                    <h4>Requirements</h4>
                                    <ul>
                                        <li>Strong background in PHP and Web application development</li>
                                        <li>Javascript a plus</li>
                                        <li>Bachelor's degree in CS and/or equivalent industry experience</li>
                                    </ul>

                                    <p>Experience building production applications with Metronic would be good to have as well.</p>

                                    <h4>Responsibilities</h4>
                                    <ul>
                                        <li>Conduct detailed analysis of problem domains and customer requirements</li>
                                        <li>Develop innovative software designs and architectures</li>
                                    </ul>

                                    <hr>
                                    <p>Qualified candidates, send resume and salary requirements with form in the sidebar.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_2">
                                    Systems Administrator/Operations Engineer
                                    </a>
                                </h4>
                            </div>
                            <div id="accordion1_2" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    <p class="lead">Metronic is seeking an experienced.</p>

                                    <h4>Requirements</h4>
                                    <ul>
                                        <li>Strong background in PHP and Web application development</li>
                                        <li>Javascript a plus</li>
                                        <li>Bachelor's degree in CS and/or equivalent industry experience</li>
                                    </ul>

                                    <p>Experience building production applications with Metronic would be good to have as well.</p>

                                    <h4>Responsibilities</h4>
                                    <ul>
                                        <li>Conduct detailed analysis of problem domains and customer requirements</li>
                                        <li>Develop innovative software designs and architectures</li>
                                    </ul>

                                    <hr>
                                    <p>Qualified candidates, send resume and salary requirements with form in the sidebar.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_3">
                                    Technical Support Engineer
                                    </a>
                                </h4>
                            </div>
                            <div style="height: 0px;" id="accordion1_3" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    <p class="lead">Metronic is seeking an experienced.</p>

                                    <h4>Requirements</h4>
                                    <ul>
                                        <li>Strong background in PHP and Web application development</li>
                                        <li>Javascript a plus</li>
                                        <li>Bachelor's degree in CS and/or equivalent industry experience</li>
                                    </ul>

                                    <p>Experience building production applications with Metronic would be good to have as well.</p>

                                    <h4>Responsibilities</h4>
                                    <ul>
                                        <li>Conduct detailed analysis of problem domains and customer requirements</li>
                                        <li>Develop innovative software designs and architectures</li>
                                    </ul>

                                    <hr>
                                    <p>Qualified candidates, send resume and salary requirements with form in the sidebar.</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 sidebar2">
			<h2 class="padding-top-30">{{ucwords(Lang::get('site.our_contacts'))}}</h2>
	          <address>
	            <strong>{{$site_settings->site_title}}</strong><br>
	            @if(isset($site_settings->main_address))
	            {{$site_settings->main_address}}<br>
	            @endif
	            @if(isset($site_settings->main_telephone))
	            <abbr title="{{ucfirst(Lang::get('site.phone'))}}">P:</abbr> <a href="tel:{{$site_settings->main_telephone}}">{{$site_settings->main_telephone}}</a>
	            <br/>
	            @endif
	            @if(isset($site_settings->main_fax))
	            <abbr title="{{ucfirst(Lang::get('site.fax'))}}">F:</abbr> {{$site_settings->main_fax}}
	            @endif
	          </address>
	          @if(isset($site_settings->main_email))
	          <address>
	            <strong>{{ucwords(Lang::get('site.email'))}}</strong><br>
	            <a href="mailto:{{$site_settings->main_email}}">{{$site_settings->main_email}}</a><br>
	          </address>
	          @endif


            <h2 class="padding-top-20">Contact Form</h2>
            <!-- BEGIN FORM-->
            <form action="#" role="form">
              <div class="form-group">
                <label for="career-name">Name</label>
                <input type="text" class="form-control" id="career-name">
              </div>
              <div class="form-group">
                <label for="career-position">Position</label>
                <select class="form-control" id="career-position">
                  <option>Senior Software Engineer</option>
                  <option>Systems Administrator/Operations Engineer</option>
                  <option>Technical Support Engineer</option>
                </select>
              </div>
              <div class="form-group">
                <label for="career-resume">Resume</label>
                <input type="file" id="career-resume">
              </div>
              <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Send</button>
            </form>
            <!-- END FORM-->
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- BEGIN SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection

@section('headerPlugins')
<link href="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
<link href="/themes/bootstrap/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link href="/themes/bootstrap/assets/frontend/pages/css/gallery.css" rel="stylesheet">
@endsection

@section('footerPlugins')
<script src="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="/themes/bootstrap/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>

<script src="/themes/bootstrap/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initUniform();
    });
</script>
@endsection