@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Site Map</li>
        </ul>
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Site Map</h1>
            <div class="content-page">
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <h2>Catalogue</h2>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right"></i> <a href="#">Pens</a>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right"></i> <a href="#">Parker Pens</a></li>
                            <li><i class="fa fa-angle-right"></i> <a href="#">Waterman</a></li>
                            <li><i class="fa fa-angle-right"></i> <a href="#">Ballpoint Parker Pens</a></li>
                            <li><i class="fa fa-angle-right"></i> <a href="#">Personalised Pen Gift Sets</a></li>
                            <li><i class="fa fa-angle-right"></i> <a href="#">Fountain Pens</a></li>
                          </ul>
                      </li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Keyrings</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Business Card Holders</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Lighters</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Personalised Gifts</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">USB Memory Sticks</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Dummies with Name</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Other Gadgets</a></li>
                  </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                  <h2>Information</h2>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right"></i> <a href="#">Special Offers</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">My Account</a>
                      <ul class="list-unstyled">
                        <li><i class="fa fa-angle-right"></i> <a href="#">Account Information</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="#">Password</a></li>
                      </ul>
                    </li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Shopping Cart</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Checkout</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Search</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">About Us</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Delivery</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Returns</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Feedback</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Gallery</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                  <h2>Pages</h2>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right"></i> <a href="#">Special Offers</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Shopping Cart</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Checkout</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Search</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">About Us</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Delivery</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Privacy Policy</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Terms &amp; Conditions</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Returns</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Feedback</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Gallery</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                  <h2>Futures</h2>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right"></i> <a href="#">Special Offers</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">My Account</a>
                      <ul class="list-unstyled">
                        <li><i class="fa fa-angle-right"></i> <a href="#">Account Information</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="#">Password</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="#">Address Book</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="#">Order History</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="#">Downloads</a></li>
                      </ul>
                    </li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Shopping Cart</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Checkout</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Search</a></li>
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
			Layout.initFixHeaderWithPreHeader();
        });
    </script>
@endsection