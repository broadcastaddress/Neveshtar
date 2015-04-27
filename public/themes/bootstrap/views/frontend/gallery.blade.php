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
          <div class="col-md-12">
            <h1>{{$title}}</h1>
            <div class="content-page">
              <div class="row margin-bottom-40">
              	@foreach($item->gallery as $image)
                <div class="col-md-3 col-sm-4 gallery-item">
                  <a data-rel="fancybox-button" title="{{$image->title}}" href="/uploads/images/{{$image->url}}" class="fancybox-button">
                    <img alt="" src="/uploads/images/c_{{$image->url}}" class="img-responsive">
                    <div class="zoomix"><i class="fa fa-search"></i></div>
                  </a>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
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
        Layout.initFixHeaderWithPreHeader();
    });
</script>
@endsection