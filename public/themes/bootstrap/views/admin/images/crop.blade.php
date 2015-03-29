@extends($theme_layout)

@section('content')
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-pencil"></i> {{$title}}
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="/admin/{{$active}}/crop" method="POST" id="admin_form" class="form-horizontal">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-body">
						<h3 class="form-section"><i class="fa fa-edit"></i> {{Lang::get('admin.content')}}</h3>
						@foreach($errors->all() as $error)
						<div class="alert alert-danger">
							<button class="close" data-close="alert"></button>
							{{$error}}
						</div>
						@endforeach
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							{{Lang::get('admin.form_errors')}}
						</div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button>
							{{Lang::get('admin.form_success')}}
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">{{Lang::get('admin.title')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-11">
								<input type="text" name="title" value="{{$file_title}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1">{{Lang::get('admin.crop')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-11">
								<img id="crop_me" src="/precrop/3_{{$resized}}" alt="{{$title}}">
								<input type="hidden" name="x" id="x" data-required="1" required>
								<input type="hidden" name="y" id="y" data-required="1" required>
								<input type="hidden" name="w" id="w" data-required="1" required>
								<input type="hidden" name="h" id="h" data-required="1" required>
								<input type="hidden" name="url" value="{{$resized}}" data-required="1" required>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-1 col-md-10">
								<button type="submit" class="btn green">Submit</button>
							</div>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
			<!-- END VALIDATION STATES-->
		</div>
	</div>
</div>
@endsection

@section('headerPlugins')
@endsection

@section('header')
<link href="/themes/bootstrap/assets/global/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" media="screen"/>
@endsection

@section('footerPlugins')
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script src="/themes/bootstrap/assets/global/plugins/jcrop/js/jquery.color.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jcrop/js/jquery.Jcrop.min.js" type="text/javascript"></script>
@endsection

@section('footer')
<script src="/themes/bootstrap/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/pages/scripts/form-validation.js"></script>
<script>
$(function(){
	$('#crop_me').Jcrop({
	  onSelect: updateCoords,
	  minSize: [260,195],
	  aspectRatio: 8/6,
	  setSelect: [0,0,260,195]
	});
});
function updateCoords(c)
{
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#w').val(c.w);
	$('#h').val(c.h);
};
</script>
@endsection

@section('inits')
FormValidation.init();
@endsection