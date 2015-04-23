@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="#">{{$title}}</a></li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>{{$title}}</h1>
            <div class="content-page">
                <div class="filter-v1">
                  <ul class="mix-filter">
                    <li data-filter="all" class="filter active">{{$item->title}} ({{ucwords(Lang::get('site.all'))}})</li>
                    @foreach($subcategories as $sub)
                    <li data-filter="{{$sub->slug}}" class="filter">{{$sub->title}}</li>
                    @endforeach
                  </ul>
                  <div class="row mix-grid thumbnails">
                      @foreach($posts as $post)
                      <div class="col-md-3 col-sm-4 mix {{$post->category->slug}} mix_all" style="display: block; opacity: 1; ">
                        <div class="mix-inner">
                           <img alt="" src="/uploads/images/4_{{$post->main_image->url}}" class="img-responsive">
                           <div class="mix-details">
                              <h4>{{Illuminate\Support\Str::Words($post->title,8)}}</h4>
                              <a class="mix-link" href="/{{$post->language}}/{{$post->slug}}"><i class="fa fa-link"></i></a>
                              <a data-rel="fancybox-button" title="{{$post->title}}" href="/uploads/images/{{$post->main_image->url}}" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                           </div>
                        </div>
                      </div>
                      @endforeach
                  </div>
              </div>
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
<link href="/themes/bootstrap/assets/frontend/pages/css/portfolio.css" rel="stylesheet">
@endsection

@section('footerPlugins')
<script src="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="/themes/bootstrap/assets/global/plugins/jquery-mixitup/jquery.mixitup.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/frontend/pages/scripts/portfolio.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Portfolio.init();
    });
</script>
@endsection