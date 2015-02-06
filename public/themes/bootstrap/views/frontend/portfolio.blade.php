@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Portfolio</a></li>
            <li class="active">Portfolio 4 Column</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Portfolio 4 Column</h1>
            <div class="content-page">
                <div class="filter-v1">
                  <ul class="mix-filter">
                    <li data-filter="all" class="filter active">All</li>
                    <li data-filter="category_1" class="filter">UI Design</li>
                    <li data-filter="category_2" class="filter">Web Development</li>
                    <li data-filter="category_3" class="filter">Photography</li>
                    <li data-filter="category_3 category_1" class="filter">Wordpress and Logo</li>
                  </ul>
                  <div class="row mix-grid thumbnails">
                      <div class="col-md-3 col-sm-4 mix category_1 mix_all" style="display: block; opacity: 1; ">
                        <div class="mix-inner">
                           <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img1.jpg" class="img-responsive">
                           <div class="mix-details">
                              <h4>Cascusamus et iusto odio</h4>
                              <a class="mix-link" href="/portfolioItem"><i class="fa fa-link"></i></a>
                              <a data-rel="fancybox-button" title="Project Name" href="/themes/bootstrap/assets/frontend/pages/img/works/img1.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                           </div>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-4 mix category_2 mix_all" style="display: block; opacity: 1; ">
                           <div class="mix-inner">
                              <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img2.jpg" class="img-responsive">
                              <div class="mix-details">
                                 <h4>Cascusamus et iusto accusamus</h4>
                                 <a class="mix-link"><i class="fa fa-link"></i></a>
                                 <a data-rel="fancybox-button" title="Project Name" href="/themes/bootstrap/assets/frontend/pages/img/works/img2.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                              </div>
                           </div>
                      </div>
                      <div class="col-md-3 col-sm-4 mix category_3 mix_all" style="display: block; opacity: 1; ">
                           <div class="mix-inner">
                              <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img3.jpg" class="img-responsive">
                              <div class="mix-details">
                                 <h4>Cascusamus et iusto accusamus</h4>
                                 <a class="mix-link"><i class="fa fa-link"></i></a>
                                 <a data-rel="fancybox-button" title="Project Name" href="/themes/bootstrap/assets/frontend/pages/img/works/img3.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-4 mix category_1 category_2 mix_all" style="display: block; opacity: 1; ">
                           <div class="mix-inner">
                             <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img4.jpg" class="img-responsive">
                             <div class="mix-details">
                                 <h4>Cascusamus et iusto accusamus</h4>
                                 <a class="mix-link"><i class="fa fa-link"></i></a>
                                 <a data-rel="fancybox-button" title="Project Name" href="/themes/bootstrap/assets/frontend/pages/img/works/img4.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                             </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-4 mix category_2 category_1 mix_all" style="display: block; opacity: 1; ">
                        <div class="mix-inner">
                          <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img5.jpg" class="img-responsive">
                          <div class="mix-details">
                              <h4>Cascusamus et iusto accusamus</h4>
                              <a class="mix-link"><i class="fa fa-link"></i></a>
                              <a data-rel="fancybox-button" title="Project Name" href="/themes/bootstrap/assets/frontend/pages/img/works/img5.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                          </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-4 mix category_1 category_2 mix_all" style="display: block; opacity: 1; ">
                        <div class="mix-inner">
                          <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img6.jpg" class="img-responsive">
                          <div class="mix-details">
                              <h4>Cascusamus et iusto accusamus</h4>
                              <a class="mix-link"><i class="fa fa-link"></i></a>
                              <a data-rel="fancybox-button" title="Project Name" href="/themes/bootstrap/assets/frontend/pages/img/works/img6.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                          </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-4 mix category_2 category_3 mix_all" style="display: block; opacity: 1; ">
                        <div class="mix-inner">
                          <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img1.jpg" class="img-responsive">
                          <div class="mix-details">
                              <h4>Cascusamus et iusto accusamus</h4>
                              <a class="mix-link"><i class="fa fa-link"></i></a>
                              <a data-rel="fancybox-button" title="Project Name" href="/themes/bootstrap/assets/frontend/pages/img/works/img1.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                          </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-4 mix category_1 category_2 mix_all" style="display: block; opacity: 1; ">
                        <div class="mix-inner">
                          <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img2.jpg" class="img-responsive">
                          <div class="mix-details">
                              <h4>Cascusamus et iusto accusamus</h4>
                              <a class="mix-link"><i class="fa fa-link"></i></a>
                              <a data-rel="fancybox-button" title="Project Name" href="/themes/bootstrap/assets/frontend/pages/img/works/img2.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                          </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-4 mix category_3 mix_all" style="display: block; opacity: 1; ">
                        <div class="mix-inner">
                          <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img4.jpg" class="img-responsive">
                          <div class="mix-details">
                              <h4>Cascusamus et iusto accusamus</h4>
                              <a class="mix-link"><i class="fa fa-link"></i></a>
                              <a data-rel="fancybox-button" title="Project Name" href="/themes/bootstrap/assets/frontend/pages/img/works/img4.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                          </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-4 mix category_1 mix_all" style="display: block; opacity: 1; ">
                        <div class="mix-inner">
                          <img alt="" src="/themes/bootstrap/assets/frontend/pages/img/works/img3.jpg" class="img-responsive">
                          <div class="mix-details">
                              <h4>Cascusamus et iusto accusamus</h4>
                              <a class="mix-link"><i class="fa fa-link"></i></a>
                              <a data-rel="fancybox-button" title="Project Name" href="/themes/bootstrap/assets/frontend/pages/img/works/img3.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                          </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- BEGIN SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection

@section('headerPlugins')
<link href="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
<link href="/themes/bootstrap/assets/frontend/pages/css/portfolio.css" rel="stylesheet">
@endsection

@section('footerPlugins')
<script src="/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="/themes/bootstrap/assets/global/plugins/jquery-mixitup/jquery.mixitup.min.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/frontend/pages/scripts/portfolio.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initTwitter();
        Portfolio.init();
    });
</script>
@endsection