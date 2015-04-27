@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">{{$title}}</li>
        </ul>
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <div class="content-page">
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <ul class="tabbable faq-tabbable">
                  <?php $i = 0; ?>
                  @foreach($subcategories as $sub)
                  <?php $i++; ?>
                  	@if($i == 1)
                    <li class="active"><a href="#tab_{{$i}}" data-toggle="tab">{{$sub->title}}</a></li>
                    @else
                    <li><a href="#tab_{{$i}}" data-toggle="tab">{{$sub->title}}</a></li>
                    @endif
                  @endforeach
                  </ul>
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="tab-content" style="padding:0; background: #fff;">
                      <!-- START TAB -->
	                  <?php $i = 0; ?>
	                  @foreach($subcategories as $sub)
	                  <?php $i++; ?>
	                  <?php $cat_id = $sub->category_id; ?>
	                  @if ($i == 1)
                      <div class="tab-pane active" id="tab_{{$i}}">
                      @else
                      <div class="tab-pane" id="tab_{{$i}}">
                      @endif
						<div class="panel-group" id="accordion{{$sub->id}}">
		                 	<?php $x = 0; ?>
		                 	@foreach($posts as $post)
		                 	@if($post->category_id <> $sub->id)
		                 	<?php $x = -1; ?>
		                 	@endif
		                 	<?php $x++; ?>
		                     	@if($post->category_id == $sub->id)
		                        <div class="panel panel-default">
		                           <div class="panel-heading">
		                              <h4 class="panel-title">
	                                 @if($x == 1)
	                                 <a href="#accordion{{$sub->id}}_{{$x}}" data-parent="#accordion{{$sub->id}}" data-toggle="collapse" class="accordion-toggle collapsed">
	                                 @else
	                                 <a href="#accordion{{$sub->id}}_{{$x}}" data-parent="#accordion{{$sub->id}}" data-toggle="collapse" class="accordion-toggle">
	                                 @endif
	                                 {{$x}}. {{ucfirst($post->title)}}
	                                 </a>
		                              </h4>
		                           </div>
		                           @if($x == 1)
		                           <div class="panel-collapse collapse in" id="accordion{{$sub->id}}_{{$x}}">
		                           @else
		                           <div class="panel-collapse collapse" id="accordion{{$sub->id}}_{{$x}}">
		                           @endif
		                              <div class="panel-body">
		                                 {!!ucfirst($post->description)!!}
		                              </div>
		                           </div>
		                        </div>
		                    @endif
		                    @endforeach
                         </div>
                      </div>
                      @endforeach
                      <!-- END TAB -->
                    </div>
                </div>
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