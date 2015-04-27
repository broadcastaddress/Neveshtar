@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">{{ucwords($title)}}</li>
        </ul>
       <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="/{{Lang::getLocale()}}/profile"><i class="fa fa-angle-right"></i> {{ucwords(Lang::get('site.my_profile'))}}</a></li>
              <li class="list-group-item clearfix"><a href="/{{Lang::getLocale()}}/password"><i class="fa fa-angle-right"></i> {{ucwords(Lang::get('site.change_password'))}}</a></li>
            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>{{ucwords($title)}}</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                  <form class="form-horizontal" role="form" id="admin_form" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="row">
							<div class="col-md-12">
							@if(Session::has('message'))
							<div class="alert alert-success">
								{{Session::get('message')}}
							</div>
							@endif
							</div>
						</div>
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
                    <fieldset>
                      <legend>{{ucfirst(Lang::get('site.personal_details'))}}</legend>
                      <div class="form-group">
                        <label for="firstname" class="col-lg-4 control-label">{{ucwords(Lang::get('site.full_name'))}} <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required data-required="1">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">{{ucwords(Lang::get('site.email'))}}</label>
                        <div class="col-lg-8">
                          <input type="text" disabled="disabled" class="form-control" value="{{$user->email}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">{{ucwords(Lang::get('site.created_on'))}}</label>
                        <div class="col-lg-8">
                          <input type="text" disabled="disabled" class="form-control" value="{{$user->created_at}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">{{ucwords(Lang::get('site.last_update'))}}</label>
                        <div class="col-lg-8">
                          <input type="text" disabled="disabled" class="form-control" value="{{$user->updated_at}}">
                        </div>
                      </div>
                    </fieldset>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <button type="submit" class="btn btn-primary">{{ucwords(Lang::get('site.update_info'))}}</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
        </div>
      </div>
    </div>
@endsection

@section('headerPlugins')
<link href="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/themes/bootstrap/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/themes/bootstrap/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
@endsection

@section('footerPlugins')
<script src="/themes/bootstrap/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="/themes/bootstrap/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script src="/themes/bootstrap/assets/admin/pages/scripts/form-validation.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        FormValidation.init();
        Layout.initFixHeaderWithPreHeader();
    });
</script>
@endsection