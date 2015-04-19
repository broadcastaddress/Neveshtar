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
							<label class="control-label col-md-3">{{Lang::get('admin.name')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<input type="text" name="name" value="{{$item->name}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.email')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<input type="text" name="email" value="{{$item->email}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.title')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="title" value="{{$item->title}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.intro')}}
							</label>
							<div class="col-md-8">
								<textarea name="intro" class="form-control">{{$item->intro}}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.facebook')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="facebook" value="{{$item->facebook}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.twitter')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="twitter" value="{{$item->twitter}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.google_plus')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="google_plus" value="{{$item->google_plus}}" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.linkedin')}}
							</label>
							<div class="col-md-8">
								<input type="text" name="linkedin" value="{{$item->linkedin}}" class="form-control"/>
							</div>
						</div>
						<h3 class="form-section"><i class="fa fa-image"></i> {{Lang::get('admin.media')}}</h3>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.main')}} {{Lang::get('admin.profile_image')}}</label>
							<div class="col-md-4">
								<input type="hidden" id="profile_image" name="profile_image" class="form-control select2" value="">
							</div>
						</div>
						<h3 class="form-section"><i class="fa fa-wrench"></i> {{Lang::get('admin.settings')}}</h3>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.new')}} {{Lang::get('admin.password')}} ({{Lang::get('admin.optional')}})
							</label>
							<div class="col-md-8">
								<input type="password" name="password" value="" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.type')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon">
									<i class="fa fa-unlock-alt"></i>
									</span>
									<select class="form-control" name="type" id="selectType" required data-required="1">
										<option value="user">{{ucwords(Lang::get('admin.user'))}}</option>
										<option value="admin">{{ucwords(Lang::get('admin.admin'))}}</option>
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
    $("#selectStatus").val("{{$item->status}}");
    $("#selectType").val("{{$item->type}}");

	$('#profile_image').select2({
	minimumInputLength: 2,
    tags: false,
    showSearchBox: true,
    maximumSelectionSize: 1,
    closeOnSelect: true,
    multiple: false,
	ajax: {
	    url: '/admin/images/images',
	    dataType: 'json',
	    quietMillis: 100,
	    data: function (term) {
	        return {
	            term: term
	        };
	    },
	    results: function (data) {
	        var myResults = [];
	        $.each(data, function (index, item) {
	            myResults.push({
	                'id': item.id,
	                'text': item.text,
	                'url': item.url,
	            });
	        });
	        return {
	            results: myResults,
	        };
	    }
	},
    formatResult : function(results)
    {
        this.description =
            '<img height="40" src="/uploads/images/c3_'+results.url+'"> '+results.text+''
        ;
        return this.description;
    },
    formatSelection : function(results)
    {
        this.description =
            '<img height="40" src="/uploads/images/c3_'+results.url+'"> '+results.text+''
        ;
        return this.description;
    }
	});
</script>
@if($item->profile_image)
<script>
    $("#profile_image").select2("data", { id: "{{$item->image->id}}", text: "{{$item->image->title}}", url: "{{$item->image->url}}" });
</script>
@endif
@endsection

@section('inits')
FormValidation.init();
@endsection