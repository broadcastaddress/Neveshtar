@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">{{Lang::get('site.home')}}</a></li>
            <li class="active">{{ucwords($title)}}</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>{{ucwords($title)}}</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->
                <div class="col-md-9 col-sm-9 blog-posts">
	            @if(isset($item->subtitle) && ($item->subtitle <> ""))
		            <h2>{{ucfirst($item->subtitle)}}</h2>
		            <br/>
	            @endif
                  @if(isset($item->intro) && ($item->intro <> ""))
                  <div class="row">
                  	<div class="col-sm-12">
	                  	<blockquote>
				            <p>{{$item->intro}}</p>
	                  	</blockquote>
                  	</div>
                  </div>
	              @endif
                  @if(isset($item->description) && ($item->description <> ""))
                  <div class="row">
                  	<div class="col-sm-12">
	                  	<p>{!!$item->description!!}</p>
                  	</div>
                  </div>
                  @endif
                  @if(isset($item->quote) && ($item->quote <> ""))
                  <div class="row">
                  	<div class="col-sm-12">
	                  	<blockquote>
				            <p>{{$item->quote}}</p>
				            @if(isset($item->quote_author) && ($item->quote_author <> ""))
				            <small>{{$item->quote_author}}</small>
				            @endif
	                  	</blockquote>
                  	</div>
                  </div>
                  @endif

                  @foreach($item->items as $post)
                  <div class="row">
                    <div class="col-md-4 col-sm-4">
                      <!-- BEGIN CAROUSEL -->
                      <div class="front-carousel">
                        <div class="carousel slide" id="myCarousel">
                          <!-- Carousel items -->
                          <div class="carousel-inner">
                            <div class="item">
                              <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img1.jpg">
                            </div>
                            <div class="item">
                              <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img2.jpg">
                            </div>
                            <div class="item active">
                              <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img3.jpg">
                            </div>
                          </div>
                          <!-- Carousel nav -->
                          <a data-slide="prev" href="#myCarousel" class="carousel-control left">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a data-slide="next" href="#myCarousel" class="carousel-control right">
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </div>
                      <!-- END CAROUSEL -->
                    </div>
                    <div class="col-md-8 col-sm-8">
                      <h2><a href="/categoryItem">{{ucwords($post->title)}}</a></h2>
                      <ul class="blog-info">
                        <li><i class="fa fa-calendar"></i> {{$post->created_at->diffForHumans()}}</li>
                        <li><i class="fa fa-comments"></i> 17</li>
                        <li><i class="fa fa-tags"></i> Metronic, Keenthemes, UI Design</li>
                      </ul>
                      <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui sint blanditiis prae sentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing condimentum eleifend enim a feugiat.</p>
                      <a href="blog-item.html" class="more">Read more <i class="icon-angle-right"></i></a>
                    </div>
                  </div>
                  <hr class="blog-post-sep">

				  @endforeach

                  <ul class="pagination">
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="active"><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Next</a></li>
                  </ul>
                </div>
                <!-- END LEFT SIDEBAR -->

                <!-- BEGIN RIGHT SIDEBAR -->
                <div class="col-md-3 col-sm-3 blog-sidebar">
                  <!-- SUBCATEGORIES START -->
                  @if(count($subcategories) > 0)
                  <h2 class="no-top-space">{{ucfirst(Lang::get('site.sub'))}} {{ucfirst(Lang::get('site.categories'))}}</h2>
                  <ul class="nav sidebar-categories margin-bottom-40">
                  	@foreach($subcategories as $sub)
                  	@if($sub->slug == $item->slug)
                    <li class="active">
                    @else
                    <li>
                    @endif
                    	<a href="/{{Lang::getLocale()}}/c/{{$sub->slug}}">{{ucwords($sub->title)}}</a>
                	</li>
                    @endforeach
                  </ul>
                  @endif
                  <!-- SUBCATEGORIES END -->

                  <!-- CATEGORIES START -->
                  @if(count($categories) > 1)
                  @if(count($subcategories) > 0)
                  <h2>
                  @else
                  <h2 class="no-top-space">
                  @endif
                  {{ucfirst(Lang::get('site.other'))}} {{ucfirst(Lang::get('site.categories'))}}</h2>
                  <ul class="nav sidebar-categories margin-bottom-40">
                  	@foreach($categories as $category)
                  	@if($category->slug == $item->slug)
                    <li class="active">
                    @else
                    <li>
                    @endif
                    	<a href="/{{Lang::getLocale()}}/c/{{$category->slug}}">{{ucwords($category->title)}}</a>
                	</li>
                    @endforeach
                  </ul>
                  @endif
                  <!-- CATEGORIES END -->

                  <!-- CATEGORIES START -->
                  @if(isset($parentcategories))
                  @if(count($subcategories) > 0 || count($categories) > 0)
                  <h2>
                  @else
                  <h2 class="no-top-space">
                  @endif
                  {{ucfirst(Lang::get('site.parent'))}} {{ucfirst(Lang::get('site.categories'))}}</h2>
                  <ul class="nav sidebar-categories margin-bottom-40">
                  	@foreach($parentcategories as $category)
                  	@if($category->slug == $item->slug)
                    <li class="active">
                    @else
                    <li>
                    @endif
                    	<a href="/{{Lang::getLocale()}}/c/{{$category->slug}}">{{ucwords($category->title)}}</a>
                	</li>
                    @endforeach
                  </ul>
                  @endif
                  <!-- CATEGORIES END -->

                  <!-- BEGIN RECENT NEWS -->
                  @if(count($categories) < 2)
                  <h2 class="no-top-space">Recent News</h2>
                  @else
                  <h2>Recent News</h2>
                  @endif
                  <div class="recent-news margin-bottom-10">
                    <div class="row margin-bottom-10">
                      <div class="col-md-3">
                        <img class="img-responsive" alt="" src="/themes/bootstrap/assets/frontend/pages/img/people/img2-large.jpg">
                      </div>
                      <div class="col-md-9 recent-news-inner">
                        <h3><a href="#">Letiusto gnissimos</a></h3>
                        <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
                      </div>
                    </div>
                    <div class="row margin-bottom-10">
                      <div class="col-md-3">
                        <img class="img-responsive" alt="" src="/themes/bootstrap/assets/frontend/pages/img/people/img1-large.jpg">
                      </div>
                      <div class="col-md-9 recent-news-inner">
                        <h3><a href="#">Deiusto anissimos</a></h3>
                        <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
                      </div>
                    </div>
                    <div class="row margin-bottom-10">
                      <div class="col-md-3">
                        <img class="img-responsive" alt="" src="/themes/bootstrap/assets/frontend/pages/img/people/img3-large.jpg">
                      </div>
                      <div class="col-md-9 recent-news-inner">
                        <h3><a href="#">Tesiusto baissimos</a></h3>
                        <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
                      </div>
                    </div>
                  </div>
                  <!-- END RECENT NEWS -->

                  <!-- BEGIN BLOG TALKS -->
                  <div class="blog-talks margin-bottom-30">
                    <h2>Popular Talks</h2>
                    <div class="tab-style-1">
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">Multipurpose</a></li>
                        <li><a data-toggle="tab" href="#tab-2">Documented</a></li>
                      </ul>
                      <div class="tab-content">
                        <div id="tab-1" class="tab-pane row-fluid fade in active">
                          <p class="margin-bottom-10">Raw denim you probably haven't heard of them jean shorts Austin. eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.</p>
                          <p><a class="more" href="#">Read more</a></p>
                        </div>
                        <div id="tab-2" class="tab-pane fade">
                          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. aliquip jean shorts ullamco ad vinyl aesthetic magna delectus mollit. Keytar helvetica VHS salvia..</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- END BLOG TALKS -->

                  <!-- BEGIN BLOG PHOTOS STREAM -->
                  <div class="blog-photo-stream margin-bottom-20">
                    <h2>Photos Stream</h2>
                    <ul class="list-unstyled">
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/people/img5-small.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img1.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/people/img4-large.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img6.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/pics/img1-large.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/pics/img2-large.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img3.jpg"></a></li>
                      <li><a href="#"><img alt="" src="/themes/bootstrap/assets/frontend/pages/img/people/img2-large.jpg"></a></li>
                    </ul>
                  </div>
                  <!-- END BLOG PHOTOS STREAM -->

                  <!-- BEGIN BLOG TAGS -->
                  <div class="blog-tags margin-bottom-20">
                    <h2>Tags</h2>
                    <ul>
                      <li><a href="#"><i class="fa fa-tags"></i>OS</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Metronic</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Dell</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Conquer</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>MS</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Google</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Keenthemes</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Twitter</a></li>
                    </ul>
                  </div>
                  <!-- END BLOG TAGS -->
                </div>
                <!-- END RIGHT SIDEBAR -->
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection

@section('headerPlugins')
<link href="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
@endsection

@section('footerPlugins')
<script src="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="/themes/bootstrap/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initTwitter();
    });
</script>
@endsection