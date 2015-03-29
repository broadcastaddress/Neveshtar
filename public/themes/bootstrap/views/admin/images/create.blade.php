@extends($theme_layout)

@section('content')
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> {{$title}}
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="/admin/{{$active}}" method="post" id="admin_form" class="form-horizontal" enctype="multipart/form-data">
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
							<label class="control-label col-md-3">{{Lang::get('admin.title')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<input type="text" name="title" value="{{old('title')}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label col-md-3">{{Lang::get('admin.image')}} {{Lang::get('admin.file')}}  <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 400px; height: 300px;">
									</div>
									<div>
										<span class="btn default btn-file">
										<span class="fileinput-new">
										{{Lang::get('admin.select')}} {{Lang::get('admin.image')}}</span>
										<span class="fileinput-exists">
										{{Lang::get('admin.change')}} </span>
										<input type="file" name="file" required data-required="1">
										</span>
										<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
										{{Lang::get('admin.remove')}} </a>
									</div>
								</div>
							</div>
						</div>
						<h3 class="form-section"><i class="fa fa-wrench"></i> {{Lang::get('admin.settings')}}</h3>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.watermark')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon">
									<i class="fa fa-unlock-alt"></i>
									</span>
									<select class="form-control" name="watermark" id="selectWatermark" required data-required="1">
										<option value="1">{{ucwords(Lang::get('admin.yes'))}}</option>
										<option value="0">{{ucwords(Lang::get('admin.no'))}}</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.status')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon">
									<i class="fa fa-unlock-alt"></i>
									</span>
									<select class="form-control" name="status" id="selectStatus" required data-required="1">
										<option value="1">{{ucwords(Lang::get('admin.activated'))}}</option>
										<option value="0">{{ucwords(Lang::get('admin.deactivated'))}}</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn green">Submit</button>
								<button type="button" onclick="history.go(-1);" class="btn default">Cancel</button>
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
<link rel="stylesheet" type="text/css" href="/themes/bootstrap/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
@endsection

@section('footerPlugins')
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
@endsection

@section('footer')
<script src="/themes/bootstrap/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/pages/scripts/form-validation.js"></script>

<script>
    $("#selectStatus").val("{{old('status')}}");
</script>
<script>
    $("#selectWatermark").val("{{old('watermark')}}");
</script>
@endsection

@section('inits')
FormValidation.init();
@endsection