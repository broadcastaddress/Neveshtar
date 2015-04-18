@extends($theme_layout)

@section('content')
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-pencil"></i>{{Lang::get('admin.settings')}} - {{$title}}
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="/admin/{{$active}}/{{$item->id}}" method="POST" id="admin_form" class="form-horizontal">
					<input name="_method" type="hidden" value="PUT">
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
								<input type="text" name="site_title" value="{{$item->site_title}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.slogan')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<input type="text" name="site_slogan" value="{{$item->site_slogan}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.description')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<input type="text" name="site_description" value="{{$item->site_description}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.keywords')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<input type="text" name="site_keywords" value="{{$item->site_keywords}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.url')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<input type="text" name="site_url" value="{{$item->site_url}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.author')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<input type="text" name="site_author" value="{{$item->site_author}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.image')}} {{Lang::get('admin.url')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<input type="text" name="site_image" value="{{$item->site_image}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.telephone')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="main_telephone" value="{{$item->main_telephone}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.email')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="main_email" value="{{$item->main_email}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.address')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="main_address" value="{{$item->main_address}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.fax')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="main_fax" value="{{$item->main_fax}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.about_us')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<textarea name="short_about_us" data-required="1" class="form-control" rows="5" required>{{$item->short_about_us}}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.facebook')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="social_facebook" value="{{$item->social_facebook}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.google_plus')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="social_google_plus" value="{{$item->social_google_plus}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.dribble')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="social_dribble" value="{{$item->social_dribble}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.linkedin')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="social_linkedin" value="{{$item->social_linkedin}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.twitter')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="social_twitter" value="{{$item->social_twitter}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.skype')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="social_skype" value="{{$item->social_skype}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.github')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="social_github" value="{{$item->social_github}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.youtube')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="social_youtube" value="{{$item->social_youtube}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.dropbox')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="social_dropbox" value="{{$item->social_dropbox}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.privacy_policy')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<textarea class="wysihtml5 form-control" rows="10" name="privacy_policy" data-error-container="#editor1_error">
									{{$item->privacy_policy}}
								</textarea>
								<div id="editor1_error">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.terms_of_service')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<textarea class="wysihtml5 form-control" rows="10" name="terms_of_service" data-error-container="#editor2_error">
									{{$item->terms_of_service}}
								</textarea>
								<div id="editor2_error">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.latitude')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="map_latitude" value="{{$item->map_latitude}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.longitude')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="map_longitude" value="{{$item->map_longitude}}" class="form-control"/>
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
@endsection

@section('inits')
FormValidation.init();
@endsection