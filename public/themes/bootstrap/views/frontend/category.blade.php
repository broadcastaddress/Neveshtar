@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="/{{Lang::getLocale()}}">{{Lang::get('site.home')}}</a></li>
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
				@if((!Request::Get('page')) || (Request::Get('page') < 2))
	              <!-- BEGIN CAROUSEL -->
				  @if((isset($item->main_image->url)) || (count($item->gallery) > 0))
	              <div class="front-carousel">
	                <div class="carousel slide" id="myCarousel" data-interval="false">
	                  <!-- Carousel items -->
	                  <div class="carousel-inner">
	                  	<?php $i = 0; ?>
	                  	@if(isset($item->main_image->url))
	                  	<?php $i++; ?>
	                    <div class="item active">
	                      <img alt="{{$item->main_image->title}}" src="/uploads/images/3_{{$item->main_image->url}}">
							<span class="carousel-caption row-fluid">
								<a class="fancybox-button btn btn-sm pull-right red" title="{{$item->main_image->title}}" rel="group" href="/uploads/images/{{$item->main_image->url}}"><i class="fa fa-arrows-alt"></i> {{ucwords(Lang::get('site.zoom'))}}</a>
								<p>{{$item->main_image->title}}</p>
							</span>
	                    </div>
	                    @endif
	                    @if(count($item->gallery) > 0)
	                    @foreach($item->gallery as $gallery)
	                    @if(!isset($item->main_image->url) || ($gallery->url !== $item->main_image->url))
	                    @if($i == 0)
	                    <div class="item active">
	                    @else
	                    <div class="item">
	                    @endif
	                      <img alt="{{$gallery->title}}" src="/uploads/images/3_{{$gallery->url}}">
							<span class="carousel-caption row-fluid">
								<a class="fancybox-button btn btn-sm pull-right red" title="{{$gallery->title}}" rel="group" href="/uploads/images/{{$gallery->url}}"><i class="fa fa-arrows-alt"></i> {{ucwords(Lang::get('site.zoom'))}}</a>
								<p>{{$gallery->title}}</p>
							</span>
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
	              <br/>
	              @endif
	              <!-- END CAROUSEL -->
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
                  @endif

				  @if($posts->render())
                  <hr class="blog-post-sep no-top-space">
				  {!!$posts->render()!!}
                  <hr class="blog-post-sep">
                  @else
                  <hr class="blog-post-sep no-top-space">
                  @endif
                  @foreach($posts as $post)
                  <div class="row">
                    <div class="col-md-4 col-sm-4">
                      <!-- BEGIN CAROUSEL -->
                      @if(($post->main_image <> NULL) || (count($post->gallery) > 0))
                      <div class="front-carousel">
                        <div class="carousel slide" id="myCarousel-{{$post->id}}">
                          <!-- Carousel items -->
                          <div class="carousel-inner">
                          	<?php $i = 0; ?>
                          	@if(isset($post->main_image))
                          	<?php $i++; ?>
                            <div class="item active">
                              <img alt="{{$post->main_image->title}}" src="/uploads/images/c_{{$post->main_image->url}}">
                            </div>
                            @endif
                            @if(count($post->gallery) > 0)
                            @foreach($post->gallery as $gallery)
                            @if(!isset($post->main_image->url) || ($gallery->url !== $post->main_image->url))
                            @if($i == 0)
                            <div class="item active">
                            @else
                            <div class="item">
                            @endif
                              <img alt="{{$gallery->title}}" src="/uploads/images/c_{{$gallery->url}}">
                            </div>
                            <?php $i++; ?>
                            @endif
                            @endforeach
                            @endif
                          </div>
                          <!-- Carousel nav -->
                          @if($i > 1)
                          <a data-slide="prev" href="#myCarousel-{{$post->id}}" class="carousel-control left">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a data-slide="next" href="#myCarousel-{{$post->id}}" class="carousel-control right">
                            <i class="fa fa-angle-right"></i>
                          </a>
                          @endif
                        </div>
                      </div>
                      @endif
                      <!-- END CAROUSEL -->
                    </div>
                    @if(($post->main_image <> NULL) || (count($post->gallery) > 0))
                    <div class="col-md-8 col-sm-8">
                    @else
                    <div class="col-md-12 col-sm-12">
                    @endif
                      <h2><a href="/{{Lang::getLocale()}}/{{$post->slug}}">{{ucwords($post->title)}}</a></h2>
                      <ul class="blog-info">
                        <li><i class="fa fa-clock-o"></i> {{$post->created_at->diffForHumans()}}</li>
                        <li><i class="fa fa-calendar"></i> {{$post->created_at->toDayDateTimeString()}}</li>
                        <li><i class="fa fa-comments"></i> {{count($post->comments_count)}}</li>
                        <li><i class="fa fa-tags"></i>
                        	<?php $i = 0; ?>
	                        @foreach($post->tags as $tag)
	                        	<?php $i++; ?>
	                        	<a href="/{{Lang::getLocale()}}/tag/{{$tag->tag}}">{{ucwords($tag->tag)}}</a>@if($i < count($post->tags)){{","}}@endif
	                        @endforeach
                        </li>
                      </ul>
                      <p>{{$post->intro}}</p>
                      <a href="/{{Lang::getLocale()}}/{{$post->slug}}" class="more">{{ucwords(Lang::get('site.read_more'))}} <i class="fa fa-angle-right"></i></a>
                    </div>
                  </div>
                  <hr class="blog-post-sep">

				  @endforeach

				  @if($posts->render())
				  {!!$posts->render()!!}
                  <hr class="blog-post-sep">
                  @endif

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
                  @if(count($recent) > 0)
                  @if(count($categories) < 2)
                  <h2 class="no-top-space">{{ucwords(Lang::get('site.recent_items'))}}</h2>
                  @else
                  <h2>{{ucwords(Lang::get('site.recent_items'))}}</h2>
                  @endif
                  <div class="recent-news margin-bottom-10">
                    @foreach($recent as $ritem)
                    <div class="row margin-bottom-10">
                      @if(isset($ritem->main_image->url))
                      <div class="col-md-3">
                        <img class="img-responsive" alt="{{$ritem->title}}" src="/uploads/images/c3_{{$ritem->main_image->url}}">
                      </div>
                      <div class="col-md-9 recent-news-inner">
                        <h3><a href="/{{Lang::getLocale()}}/{{$ritem->slug}}">{{$ritem->title}}</a></h3>
                        <p>{{Illuminate\Support\Str::Words($ritem->intro,10)}}</p>
                      </div>
                      @else
                      <div class="col-md-3">
                      </div>
                      <div class="col-md-9 recent-news-inner">
                        <h3><a href="/{{Lang::getLocale()}}/{{$ritem->slug}}">{{$ritem->title}}</a></h3>
                        <p>{{Illuminate\Support\Str::Words($ritem->intro,10)}}</p>
                      </div>
                      @endif
                    </div>
                    @endforeach
                  </div>
                  @endif
                  <!-- END RECENT NEWS -->

                  <!-- BEGIN BLOG TALKS -->
                  @if((count($viewed) > 0) || (count($commented) > 0))
                  <div class="blog-talks margin-bottom-30">
                    <h2>{{ucwords(Lang::get('site.most'))}}</h2>
                    <div class="tab-style-1">
                      <ul class="nav nav-tabs">
                      	@if(count($viewed) > 0)
                        <li class="active"><a data-toggle="tab" href="#tab-1">{{ucwords(Lang::get('site.viewed'))}}</a></li>
                        @endif
                        @if(count($commented) > 0)
                        <li><a data-toggle="tab" href="#tab-2">{{ucwords(Lang::get('site.commented'))}}</a></li>
                        @endif
                      </ul>
                      <div class="tab-content">
                      	@if(count($viewed) > 0)
                        <div id="tab-1" class="tab-pane row-fluid fade in active">
                      		<ol class="row">
	                        @foreach($viewed as $vitem)
	                        	<li><a href="/{{Lang::getLocale()}}/{{$vitem->item->slug}}">{{$vitem->item->title}}</a></li>
	                        @endforeach
	                        <ol>
                        </div>
                        @endif
                        @if(count($commented) > 0)
                        <div id="tab-2" class="tab-pane fade">
                      		<ol class="row">
	                        @foreach($commented as $citem)
	                        	<li><a href="/{{Lang::getLocale()}}/{{$citem->item->slug}}">{{$citem->item->title}}</a></li>
	                        @endforeach
	                        <ol>
                        </div>
                        @endif
                      </div>
                    </div>
                  </div>
                  @endif
                  <!-- END BLOG TALKS -->

                  <!-- BEGIN BLOG PHOTOS STREAM -->
                  @if(count($photos_stream) > 0)
                  <div class="blog-photo-stream margin-bottom-20">
                    <h2>Photos Stream</h2>
                    <ul class="list-unstyled">
                      @foreach($photos_stream as $stream)
                      @if($stream->main_image)
                      <li><a class="fancybox-button" rel="stream" title="{{$stream->main_image->title}}" href="/uploads/images/{{$stream->main_image->url}}"><img alt="" src="/uploads/images/c3_{{$stream->main_image->url}}"></a></li>
                      @endif
                      @endforeach
                    </ul>
                  </div>
                  @endif
                  <!-- END BLOG PHOTOS STREAM -->

                  <!-- BEGIN BLOG TAGS -->
                  @if(count($tags) > 0)
                  <div class="blog-tags margin-bottom-20">
                    <h2>{{ucwords(Lang::get('site.recent_tags'))}}</h2>
                    <ul>
                      @foreach($tags as $tag)
                      <li><a href="/{{Lang::getLocale()}}/tag/{{$tag->tag}}"><i class="fa fa-tags"></i>{{ucwords($tag->tag)}}</a></li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
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
    });
</script>
@endsection