@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="/{{Lang::getLocale()}}">Home</a></li>
            <li class="active">{{ucwords($title)}}</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12">
            <h1>{{ucwords($title)}}</h1>
            <div class="content-page">
	            <p>{!!$item!!}</p>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
      </div>
    </div>
@endsection

@section('headerPlugins')
{!! Minify::stylesheet('/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.css') !!}
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