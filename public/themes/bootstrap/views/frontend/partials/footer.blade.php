   <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>{{ucwords(Lang::get('site.about_us'))}}</h2>
            <p>{{$site_settings->short_about_us}}</p>

            @if(count($footer_photos_stream) > 0)
            <div class="photo-stream">
              <h2>{{ucwords(Lang::get('site.photos_stream'))}}</h2>
              <ul class="list-unstyled">
              	@foreach($footer_photos_stream as $footer_photo)
              	@if($footer_photo->main_image)
                <li><a class="fancybox-button" rel="footer_stream" href="/uploads/images/{{$footer_photo->main_image->url}}"><img title="{{$footer_photo->main_image->title}}" src="/uploads/images/c3_{{$footer_photo->main_image->url}}"></a></li>
                @endif
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>{{ucwords(Lang::get('site.our_contacts'))}}</h2>
            <address class="margin-bottom-40">
              @if(isset($site_settings->main_address))
              {{$site_settings->main_address}}<br>
              @endif
              @if(isset($site_settings->main_telephone))
              Phone: <a href="tel:{{$site_settings->main_telephone}}">{{$site_settings->main_telephone}}</a><br>
              @endif
              @if(isset($site_settings->main_fax))
              Fax: {{$site_settings->main_fax}}<br>
              @endif
              @if(isset($site_settings->main_email))
              Email: <a href="mailto:{{$site_settings->main_email}}">{{$site_settings->main_email}}</a><br>
              @endif
            </address>

            <div class="pre-footer-subscribe-box pre-footer-subscribe-box-vertical">
              <h2>Newsletter</h2>
              <p>Subscribe to our newsletter and stay up to date with the latest news and deals!</p>
              <form action="#">
                <div class="input-group">
                  <input type="text" placeholder="youremail@mail.com" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <!-- END BOTTOM CONTACTS -->

          <!-- BEGIN TWITTER BLOCK -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2 class="margin-bottom-0">Latest Tweets</h2>
            <a class="twitter-timeline" href="https://twitter.com/twitterapi" data-tweet-limit="2" data-theme="dark" data-link-color="#57C8EB" data-widget-id="widget-id" data-chrome="noheader nofooter noscrollbar noborders transparent">Loading Tweets</a>
          </div>
          <!-- END TWITTER BLOCK -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-6 col-sm-6 padding-top-10">
            2014 © {{$site_settings->site_title}} | <a href="/{{Lang::getLocale()}}/privacy_policy">{{ucwords(Lang::get('site.privacy_policy'))}}</a> | <a href="/{{Lang::getLocale()}}/terms_of_service">{{ucwords(Lang::get('site.terms_of_service'))}}</a>
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-6 col-sm-6">
            <ul class="social-footer list-unstyled list-inline pull-right">
              @if(isset($site_settings->social_facebook))
              <li><a target="_blank" href="{{$site_settings->social_facebook}}"><i class="fa fa-facebook"></i></a></li>
              @endif
              @if(isset($site_settings->social_google_plus))
              <li><a target="_blank" href="{{$site_settings->social_google_plus}}"><i class="fa fa-google-plus"></i></a></li>
              @endif
              @if(isset($site_settings->social_dribble))
              <li><a target="_blank" href="{{$site_settings->social_dribble}}"><i class="fa fa-dribbble"></i></a></li>
              @endif
              @if(isset($site_settings->social_linkedin))
              <li><a target="_blank" href="{{$site_settings->social_linkedin}}"><i class="fa fa-linkedin"></i></a></li>
              @endif
              @if(isset($site_settings->social_twitter))
              <li><a target="_blank" href="{{$site_settings->social_twitter}}"><i class="fa fa-twitter"></i></a></li>
              @endif
              @if(isset($site_settings->social_skype))
              <li><a target="_blank" href="{{$site_settings->social_skype}}"><i class="fa fa-skype"></i></a></li>
              @endif
              @if(isset($site_settings->social_github))
              <li><a target="_blank" href="{{$site_settings->social_github}}"><i class="fa fa-github"></i></a></li>
              @endif
              @if(isset($site_settings->social_youtube))
              <li><a target="_blank" href="{{$site_settings->social_youtube}}"><i class="fa fa-youtube"></i></a></li>
              @endif
              @if(isset($site_settings->social_dropbox))
              <li><a target="_blank" href="{{$site_settings->social_dropbox}}"><i class="fa fa-dropbox"></i></a></li>
              @endif
            </ul>
          </div>
          <!-- END PAYMENTS -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="/themes/bootstrap/assets/global/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="/themes/bootstrap/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="/themes/bootstrap/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="/themes/bootstrap/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/themes/bootstrap/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    @yield('footerPlugins')
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>