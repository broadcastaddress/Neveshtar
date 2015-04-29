<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>{{$title}}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="/themes/bootstrap/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/themes/bootstrap/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="/themes/bootstrap/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/themes/bootstrap/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/themes/bootstrap/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="/themes/bootstrap/assets/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="/themes/bootstrap/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="/themes/bootstrap/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/themes/bootstrap/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="/themes/bootstrap/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
@if($site_language->direction == "rtl")
<link href="/themes/bootstrap/assets/global/css/bootstrap-rtl.min.css" rel="stylesheet">
@endif
<link href="/themes/bootstrap/assets/admin/layout/css/custom.css" rel="stylesheet">
@if($site_language->direction == "rtl")
<link href="/themes/bootstrap/assets/frontend/layout/css/custom-rtl.css" rel="stylesheet">
<link href="/themes/bootstrap/assets/admin/layout/css/custom-rtl.css" rel="stylesheet">
@endif
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="/">
	<img src="/themes/bootstrap/assets/admin/layout/img/logo-big.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="reset-form" action="{{ url('/password/reset') }}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="token" value="{{ $token }}">
		<h3 class="form-title">{{ucwords(Lang::get('site.reset_password_form'))}}</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			{{ucfirst(Lang::get('site.enter_user_pass'))}} </span>
		</div>
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">{{ucfirst(Lang::get('site.email'))}}</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="{{ucfirst(Lang::get('site.email'))}}" name="email"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">{{ucfirst(Lang::get('site.new_password'))}}</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" id="password" type="password" autocomplete="off" placeholder="{{ucfirst(Lang::get('site.new_password'))}}" name="password"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">{{ucwords(Lang::get('site.retype_new_password'))}}</label>
			<div class="controls">
				<div class="input-icon">
					<i class="fa fa-check"></i>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="{{ucwords(Lang::get('site.retype_new_password'))}}" name="password_confirmation"/>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn blue pull-{{$site_language->opposite_direction}}">
			{{ucfirst(Lang::get('site.reset'))}} <i class="m-icon-swap{{$site_language->opposite_direction}} m-icon-white"></i>
			</button>
			<br/>
		</div>
	</form>
	<!-- END LOGIN FORM -->
</div>
<!-- END LOGIN -->
<!--[if lt IE 9]>
<script src="/themes/bootstrap/assets/global/plugins/respond.min.js"></script>
<script src="/themes/bootstrap/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="/themes/bootstrap/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/themes/bootstrap/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/themes/bootstrap/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/frontend/layout/scripts/reset-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
  Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
  Login.init();
  Demo.init();
       // init background slide images
       $.backstretch([
        "/themes/bootstrap/assets/admin/pages/media/bg/1.jpg",
        "/themes/bootstrap/assets/admin/pages/media/bg/2.jpg",
        "/themes/bootstrap/assets/admin/pages/media/bg/3.jpg",
        "/themes/bootstrap/assets/admin/pages/media/bg/4.jpg"
        ], {
          fade: 1000,
          duration: 8000
    }
    );
    <?php if(isset($_GET["register"])) { ?>
	    $('#register-btn').click();
    <?php }; ?>
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>