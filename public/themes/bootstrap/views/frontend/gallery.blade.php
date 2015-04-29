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