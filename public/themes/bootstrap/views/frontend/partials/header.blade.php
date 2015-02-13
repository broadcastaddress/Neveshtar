<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>{{$title}} -  {{Config::get('settings.name')}}</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="{{Config::get('settings.description')}}" name="description">
  <meta content="{{Config::get('settings.keywords')}}" name="keywords">
  <meta content="{{Config::get('settings.author')}}" name="author">

  <meta property="og:site_name" content="{{Config::get('settings.name')}}">
  <meta property="og:title" content="{{$title}}">
  <meta property="og:description" content="{{Config::get('settings.description')}}">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->
  <link href="/themes/bootstrap/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/themes/bootstrap/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END -->

  <!-- Page level plugin styles START -->
  @yield('headerPlugins')
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="/themes/bootstrap/assets/global/css/components.css" rel="stylesheet">
  <link href="/themes/bootstrap/assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="/themes/bootstrap/assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet"><!-- revo slider styles -->
  <link href="/themes/bootstrap/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="/themes/bootstrap/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="/themes/bootstrap/assets/frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->
