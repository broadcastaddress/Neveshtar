@extends($theme_layout)

@section('content')
<!-- BEGIN PAGE CONTENT INNER -->
<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2">
			<div class="display">
				<div class="number">
					<h3 class="font-green-sharp">7800<small class="font-green-sharp">$</small></h3>
					<small>TOTAL PROFIT</small>
				</div>
				<div class="icon">
					<i class="icon-pie-chart"></i>
				</div>
			</div>
			<div class="progress-info">
				<div class="progress">
					<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
					<span class="sr-only">76% progress</span>
					</span>
				</div>
				<div class="status">
					<div class="status-title">progress</div>
					<div class="status-number">76%</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2">
			<div class="display">
				<div class="number">
					<h3 class="font-red-haze">1349</h3>
					<small>NEW FEEDBACKS</small>
				</div>
				<div class="icon">
					<i class="icon-like"></i>
				</div>
			</div>
			<div class="progress-info">
				<div class="progress">
					<span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
					<span class="sr-only">85% change</span>
					</span>
				</div>
				<div class="status">
					<div class="status-title">change</div>
					<div class="status-number">85%</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2">
			<div class="display">
				<div class="number">
					<h3 class="font-blue-sharp">567</h3>
					<small>NEW ORDERS</small>
				</div>
				<div class="icon">
					<i class="icon-basket"></i>
				</div>
			</div>
			<div class="progress-info">
				<div class="progress">
					<span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
					<span class="sr-only">45% grow</span>
					</span>
				</div>
				<div class="status">
					<div class="status-title">grow</div>
					<div class="status-number">45%</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2">
			<div class="display">
				<div class="number">
					<h3 class="font-purple-soft">276</h3>
					<small>NEW USERS</small>
				</div>
				<div class="icon">
					<i class="icon-user"></i>
				</div>
			</div>
			<div class="progress-info">
				<div class="progress">
					<span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
					<span class="sr-only">56% change</span>
					</span>
				</div>
				<div class="status">
					<div class="status-title">change</div>
					<div class="status-number">57%</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-sm-12">
	</div>
	<div class="col-md-6 col-sm-12">
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-sm-12">
	</div>
	<div class="col-md-6 col-sm-12">
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-sm-6">
	</div>
	<div class="col-md-6 col-sm-6">
	</div>
</div>
<!-- END PAGE CONTENT INNER -->
@endsection

@section('headerPlugins')
<link href="/themes/bootstrap/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="/themes/bootstrap/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="/themes/bootstrap/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
@endsection

@section('header')
<link href="/themes/bootstrap/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
@endsection

@section('footerPlugins')
<script src="/themes/bootstrap/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="/themes/bootstrap/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
@endsection

@section('footer')
<script src="/themes/bootstrap/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
@endsection

@section('inits')
Demo.init(); // init demo features
Index.init();
Index.initDashboardDaterange();
Index.initJQVMAP(); // init index page's custom scripts
Index.initCalendar(); // init index page's custom scripts
Index.initCharts(); // init index page's custom scripts
Index.initChat();
Index.initMiniCharts();
Tasks.initDashboardWidget();
@endsection