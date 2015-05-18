<!DOCTYPE html>
<!--[if IE 8]> <html lang="{{Lang::getLocale()}}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{Lang::getLocale()}}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]>
<html lang="{{Lang::getLocale()}}">
<![endif]-->
<!-- Head BEGIN -->
<head>
	<meta charset="utf-8">
	<title>{{ucwords($title)}} -  {{$site_settings->site_title}}</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content="{{$site_settings->site_description}}" name="description">
	<meta content="{{$site_settings->site_keywords}}" name="keywords">
	<meta content="{{$site_settings->site_author}}" name="author">
	<meta property="og:site_name" content="{{$site_settings->site_title}}">
	<meta property="og:title" content="{{$title}}">
	@if(!isset($main_description))
	<meta property="og:description" content="{{$site_settings->site_description}}">
	@else
	<meta property="og:description" content="{{$main_description}}">
	@endif
	<meta property="og:type" content="website">
	@if(!isset($main_image_url))
	<meta property="og:image" content="{{$site_settings->site_image}}">
	@else
	<meta property="og:image" content="{{$main_image_url}}">
	@endif
	<meta property="og:url" content="{{$_SERVER['SERVER_NAME']}}{{$_SERVER['REQUEST_URI']}}">
	<link rel="shortcut icon" href="favicon.ico">
	<!-- Fonts START -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->
	<!-- Fonts END -->
	<!-- Global styles START -->
	<link href="/themes/bootstrap/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	{!! Minify::stylesheet('/themes/bootstrap/assets/global/plugins/pace/themes/pace-theme-flash.css') !!}
	{!! Minify::stylesheet('/themes/bootstrap/assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
	<!-- Global styles END -->
	<!-- Page level plugin styles START -->
	@yield('headerPlugins')
	<!-- Page level plugin styles END -->
	<!-- Theme styles START -->
	{!! Minify::stylesheet('/themes/bootstrap/assets/global/css/components-rounded.css') !!}
	{!! Minify::stylesheet('/themes/bootstrap/assets/frontend/layout/css/style.css') !!}
	{!! Minify::stylesheet('/themes/bootstrap/assets/frontend/pages/css/style-shop.css') !!}
	{!! Minify::stylesheet('/themes/bootstrap/assets/frontend/pages/css/style-revolution-slider.css') !!}
	{!! Minify::stylesheet('/themes/bootstrap/assets/frontend/layout/css/style-responsive.css') !!}
	{!! Minify::stylesheet('/themes/bootstrap/assets/frontend/layout/css/themes/blue.css') !!}
	@if($site_language->direction == "rtl")
	{!! Minify::stylesheet('/themes/bootstrap/assets/global/css/bootstrap-rtl.min.css') !!}

	@endif
	{!! Minify::stylesheet('/themes/bootstrap/assets/frontend/layout/css/custom.css') !!}
	@if($site_language->direction == "rtl")
	{!! Minify::stylesheet('/themes/bootstrap/assets/frontend/layout/css/custom-rtl.css') !!}
	@endif
	<!-- Theme styles END -->
</head>
<!-- Head END -->
