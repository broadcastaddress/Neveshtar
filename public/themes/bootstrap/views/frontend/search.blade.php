@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Search Results</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12">
            <h1>Search Results</h1>
            <div class="content-page">
              <form action="#" class="content-search-view2">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Search</button>
                  </span>
                </div>
              </form>
              <div class="search-result-item">
                <h4><a href="#">Metronic - Responsive Admin Dashboard Template</a></h4>
                <p>Metronic is a responsive admin dashboard template powered with Twitter Bootstrap Framework for admin and backend applications. Metronic has a clean and intuitive metro style design which makes your next project look awesome and yet user friendly..</p>
                <a class="search-link" href="#">http://www.keenthemes.com</a>
              </div>
              <div class="search-result-item">
                <h4><a href="#">Metronic - Responsive Admin Dashboard Template</a></h4>
                <p>Metronic is a responsive admin dashboard template powered with Twitter Bootstrap Framework for admin and backend applications. Metronic has a clean and intuitive metro style design which makes your next project look awesome and yet user friendly..</p>
                <a class="search-link" href="#">http://www.keenthemes.com</a>
              </div>
              <div class="search-result-item">
                <h4><a href="#">Metronic - Responsive Admin Dashboard Template</a></h4>
                <p>Metronic is a responsive admin dashboard template powered with Twitter Bootstrap Framework for admin and backend applications. Metronic has a clean and intuitive metro style design which makes your next project look awesome and yet user friendly..</p>
                <a class="search-link" href="#">http://www.keenthemes.com</a>
              </div>

              <div class="row">
                <div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div>
                <div class="col-md-8 col-sm-8">
                  <ul class="pagination pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><span>2</span></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">»</a></li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
          <!-- END CONTENT -->
        </div>
      </div>
    </div>
@endsection

@section('headerPlugins')
<link href="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
@endsection

@section('footerPlugins')
<script src="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->

<script src="/themes/bootstrap/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initTwitter();
    });
</script>
@endsection