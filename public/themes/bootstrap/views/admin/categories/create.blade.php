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
				<form action="/admin/{{$active}}" method="post" id="admin_form" class="form-horizontal">
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
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.subtitle')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="subtitle" value="{{old('subtitle')}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.intro')}}
							</label>
							<div class="col-md-8">
								<textarea name="intro" class="form-control">{{old('intro')}}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.quote')}}
							</label>
							<div class="col-md-8">
								<textarea name="quote" class="form-control">{{old('quote')}}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.quote_author')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="quote_author" value="{{old('quote_author')}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.description')}}
							</label>
							<div class="col-md-8">
								<textarea class="wysihtml5 form-control" rows="10" name="description" data-error-container="#editor1_error">
									{{old('description')}}
								</textarea>
								<div id="editor1_error">
								</div>
							</div>
						</div>
						<h3 class="form-section"><i class="fa fa-wrench"></i> {{Lang::get('admin.settings')}}</h3>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.parent')}} {{Lang::get('admin.category')}}
							</label>
							<div class="col-md-4">
								<select class="form-control select2me" name="parent_id" id="selectParent">
									<option value="">{{Lang::get('admin.none')}}</option>
									@foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->title}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.slug')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<input type="text" name="slug" value="{{old('slug')}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.language')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-4">
								<select class="form-control select2me" name="language" id="selectLanguage" required data-required="1">
									@foreach($languages as $language)
									<option value="{{$language->language}}">{{$language->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.order')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon">
									<i class="fa fa-reorder"></i>
									</span>
									<input type="text" name="order" value="{{old('order')}}" data-required="1" class="form-control" required/>
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
<link rel="stylesheet" type="text/css" href="/themes/bootstrap/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/themes/bootstrap/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="/themes/bootstrap/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
@endsection

@section('footerPlugins')
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
@endsection

@section('footer')
<script src="/themes/bootstrap/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/pages/scripts/form-validation.js"></script>

<script>
$('input[name=title]').on('input', function() {
	var inputString = $(this).val();
    outputString = inputString.replace(/([â€Œ~Ù¬Ù«ï·¼ÙªÃ—ØŒÙ€Ø›ØŸØ¡!@#$%^&*"()_+=`{}\[\]\|\\:;'<>,.\/? ])+/g, '-').replace(/^(-)+|(-)+$/g,'');
	var words = outputString.replace(/\s+/gi, '-').split('-');
    $('input[name=slug]').val(words.slice(0,9).join('-'));
});
</script>
<script>
    $("#selectParent").val("{{old('parent_id')}}");
</script>
<script>
    $("#selectStatus").val("{{old('status')}}");
</script>
<script>
    $("#selectLanguage").val("{{old('language')}}");
</script>
@endsection

@section('inits')
FormValidation.init();
@endsection