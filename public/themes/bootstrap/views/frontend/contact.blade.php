@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="/{{Lang::getLocale()}}">{{ucwords(Lang::get('site.home'))}}</a></li>
            <li class="active">{{ucwords($title)}}</li>
        </ul>
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12">
            <h1>{{ucwords($title)}}</h1>
			@if(Session::has('message'))
            <div class="note note-success">
                <h4 class="block">{{ucfirst(Session::get('message'))}}</h4>
            </div>
			@endif
			@foreach($errors->all() as $error)
			<div class="alert alert-danger">
				<button class="close" data-close="alert"></button>
				{{$error}}
			</div>
			@endforeach
            <div class="content-page">
              <div class="row">
              	@if($site_settings->map_latitude && $site_settings->map_longitude)
                <div class="col-md-12">
                  <div id="map" class="gmaps margin-bottom-40" style="height:400px;"></div>
                </div>
                @endif
                <div class="col-md-9 col-sm-9">
                  <h2>{{ucwords(Lang::get('site.contact_form'))}}</h2>
                  <p>{{ucfirst(Lang::get('site.contact_form_text'))}}</p>

                  <!-- BEGIN FORM-->
                  <form action="" method="post" id="site_form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label for="contacts-name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" data-required="1" required>
                    </div>
                    <div class="form-group">
                      <label for="contacts-email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" data-required="1" required>
                    </div>
                    <div class="form-group">
                      <label for="contacts-message">Message</label>
                      <textarea class="form-control" rows="5" name="message" id="message" data-required="1" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Send</button>
                  </form>
                  <!-- END FORM-->
                </div>

                <div class="col-md-3 col-sm-3 sidebar2">
                  <h2>{{ucwords(Lang::get('site.our_contacts'))}}</h2>
                  <address>
                    <strong>{{$site_settings->site_title}}</strong><br>
                    @if(isset($site_settings->main_address))
                    {{$site_settings->main_address}}<br>
                    @endif
                    @if(isset($site_settings->main_telephone))
                    <abbr title="{{ucfirst(Lang::get('site.phone'))}}">P:</abbr> <a href="tel:{{$site_settings->main_telephone}}">{{$site_settings->main_telephone}}</a>
                    <br/>
                    @endif
                    @if(isset($site_settings->main_fax))
                    <abbr title="{{ucfirst(Lang::get('site.fax'))}}">F:</abbr> {{$site_settings->main_fax}}
                    @endif
                  </address>
                  @if(isset($site_settings->main_email))
                  <address>
                    <strong>{{ucwords(Lang::get('site.email'))}}</strong><br>
                    <a href="mailto:{{$site_settings->main_email}}">{{$site_settings->main_email}}</a><br>
                  </address>
                  @endif
                  <ul class="social-icons margin-bottom-40">
		              @if(isset($site_settings->social_facebook))
		              <li><a target="_blank" data-original-title="Facebook" class="facebook" href="{{$site_settings->social_facebook}}"></a></li>
		              @endif
		              @if(isset($site_settings->social_google_plus))
		              <li><a target="_blank" data-original-title="Google Plus" class="googleplus" href="{{$site_settings->social_google_plus}}"></a></li>
		              @endif
		              @if(isset($site_settings->social_linkedin))
		              <li><a target="_blank" data-original-title="Linkedin" class="linkedin" href="{{$site_settings->social_linkedin}}"></a></li>
		              @endif
		              @if(isset($site_settings->social_twitter))
		              <li><a target="_blank" data-original-title="Twitter" class="twitter" href="{{$site_settings->social_twitter}}"></a></li>
		              @endif
		              @if(isset($site_settings->social_skype))
		              <li><a target="_blank" data-original-title="Skype" class="skype" href="{{$site_settings->social_skype}}"></a></li>
		              @endif
		              @if(isset($site_settings->social_github))
		              <li><a target="_blank" data-original-title="Github" class="github" href="{{$site_settings->social_github}}"></a></li>
		              @endif
		              @if(isset($site_settings->social_youtube))
		              <li><a target="_blank" data-original-title="YouTube" class="youtube" href="{{$site_settings->social_youtube}}"></a></li>
		              @endif
		              @if(isset($site_settings->social_dropbox))
		              <li><a target="_blank" data-original-title="Drop Box" class="dropbox" href="{{$site_settings->social_dropbox}}"></a></li>
		              @endif
                  </ul>

                  <h2 class="padding-top-30">{{ucwords(Lang::get('site.about_us'))}}</h2>
                  @if(isset($site_settings->short_about_us))
                  <p>{{$site_settings->short_about_us}}</p>
                  @endif
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
{!! Minify::stylesheet('/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.css') !!}
{!! Minify::stylesheet('/themes/bootstrap/assets/global/plugins/uniform/css/uniform.default.css') !!}
@endsection

@section('footerPlugins')
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/uniform/jquery.uniform.min.js') !!}
{!! Minify::javascript('http://maps.google.com/maps/api/js?sensor=true') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/gmaps/gmaps.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/scripts/metronic.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/jquery-validation/js/additional-methods.min.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/select2/select2.min.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/frontend/pages/scripts/form-validation.js') !!}
@if($site_settings->map_latitude && $site_settings->map_longitude)
<script type="text/javascript">
	var ContactUs = function () {

	    return {
	        //main function to initiate the module
	        init: function () {
				var map;
				$(document).ready(function(){
				  map = new GMaps({
					div: '#map',
		            lat: {{$site_settings->map_latitude}},
					lng: {{$site_settings->map_longitude}},
				  });
				   var marker = map.addMarker({
			            lat: {{$site_settings->map_latitude}},
						lng: {{$site_settings->map_longitude}},
			            title: "{{$site_settings->site_title}}",
			            infoWindow: {
			                content: "<b>{{$site_settings->site_title}}</b> {{$site_settings->main_address}}"
			            }
			        });

				   marker.infoWindow.open(map, marker);
				});
	        }
	    };

	}();
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        ContactUs.init();
    });
</script>
@endif
{!! Minify::javascript('/themes/bootstrap/assets/frontend/layout/scripts/layout.js') !!}
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initUniform();
        FormValidation.init();
        Layout.initFixHeaderWithPreHeader();
    });
</script>
@endsection