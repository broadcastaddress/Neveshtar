@extends($theme_layout)

@section('content')
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
	@if(Session::has('message'))
	<div class="alert alert-success">
		<button class="close" data-close="alert"></button>
		{{Session::get('message')}}
	</div>
	@endif
	</div>
</div>
<div class="row">

	@foreach($items as $item)
	<div class="col-md-6">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-wrench"></i>
					<span class="caption-subject bold uppercase"> {{$item->language}}</span>
					<span class="caption-helper">{{Lang::get('admin.settings')}}</span>
				</div>
				<div class="actions">
					<a href="/admin/settings/{{$item->id}}" class="btn btn-circle btn-default">
					<i class="fa fa-pencil"></i> {{ucfirst(Lang::get('admin.edit'))}}
					</a>
				</div>
			</div>
		</div>
	</div>
	@endforeach

</div>
<!-- END PAGE CONTENT-->
@endsection

@section('headerPlugins')
@endsection

@section('header')
<link rel="stylesheet" type="text/css" href="/themes/bootstrap/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/themes/bootstrap/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="/themes/bootstrap/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
@endsection

@section('footerPlugins')
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
@endsection

@section('footer')
<script src="/themes/bootstrap/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
@endsection

@section('inits')
Demo.init(); // init demo features
@endsection