@extends($theme_layout)

@section('content')
<!-- BEGIN PAGE CONTENT INNER -->
<div class="row">
</div>
<!-- END PAGE CONTENT INNER -->
@endsection

@section('headerPlugins')
@endsection

@section('header')
@endsection

@section('footerPlugins')
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
Tasks.initDashboardWidget();
@endsection