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
							<label class="control-label col-md-3">{{Lang::get('admin.name')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<input type="text" name="name" value="{{old('name')}}" data-required="1" class="form-control" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.title')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<input type="text" name="title" value="{{old('title')}}" class="form-control" required=""/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.description')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-8">
								<textarea name="description" class="form-control" required="">{{old('description')}}</textarea>
							</div>
						</div>
						<h3 class="form-section"><i class="fa fa-image"></i> {{Lang::get('admin.media')}}</h3>
						<div class="form-group">
							<label class="control-label col-md-3">{{Lang::get('admin.profile_image')}} <span class="required">
							* </span>
							</label>
							<div class="col-md-4">
								<input type="hidden" id="author_image" name="author_image" class="form-control select2" value="" required="">
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
	$('#author_image').select2({
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
@endsection

@section('inits')
FormValidation.init();
@endsection