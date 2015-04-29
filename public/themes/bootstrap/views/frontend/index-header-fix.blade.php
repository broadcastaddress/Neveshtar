@extends($theme_layout)

@section('content')

    <!-- BEGIN SLIDER -->
    @if(count($sliders) > 0)
    <div class="page-slider margin-bottom-40">
      <div class="fullwidthbanner-container revolution-slider">
        <div class="fullwidthabnner">
          <ul id="revolutionul">
            <!-- THE NEW SLIDE -->
            @foreach($sliders as $slide)
            <li data-transition="zoomout" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="/uploads/images/{{$slide->main_image->url}}">
              <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
              <img src="/uploads/images/{{$slide->main_image->url}}" alt="">
              <div class="caption lft medium_bg_darkblue slide_item_left"
                data-x="30"
                data-y="225"
                data-speed="400"
                data-start="1500"
                data-easing="easeOutExpo">
                <span class="slide_title_white_bold">{{$slide->title}}</span>
              </div>
              <div class="caption lft mediumwhitebg slide_item_left"
                data-x="30"
                data-y="270"
                data-speed="400"
                data-start="2500"
                data-easing="easeOutExpo">
                {{$slide->subtitle}}
              </div>
              <a class="caption lft btn dark slide_btn slide_item_left" href="{{$slide->url}}" target="_blank"
                data-x="30"
                data-y="320"
                data-speed="400"
                data-start="4500"
                data-easing="easeOutExpo">
                {{Lang::get('site.read_more')}}
              </a>
            </li>
            @endforeach
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>
    </div>
    @endif
    <!-- END SLIDER -->

    <div class="main">
      <div class="container">
			<!-- Start Currency -->
			<div class="portlet">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-dollar"></i> {{Lang::get('site.currency_rates')}}
					</div>
				</div>
				<div class="portlet-body">
					<div class="table-scrollable">
						<table class="table table-striped table-bordered table-advance table-hover">
						<thead>
						<tr>
							<th>
								<i class="fa"></i> {{Lang::get('site.currency')}}
							</th>
							<th>
								<i class="fa"></i> {{Lang::get('site.buy_price')}}
							</th>
							<th>
								<i class="fa"></i> {{Lang::get('site.buy_difference')}}
							</th>
							<th>
								<i class="fa"></i> {{Lang::get('site.sell_price')}}
							</th>
							<th>
								<i class="fa"></i> {{Lang::get('site.sell_difference')}}
							</th>
						</tr>
						</thead>
						<tbody>
						@foreach($currencies as $currency)
						<tr>
							<td class="highlight">{{$currency->name}}</td>
							<?php $i = 0; ?>
							@foreach($currency->latest_data as $latest_data)
							<?php $i++; ?>
							@if($i == 1)
								<td>{{$latest_data->buy_price}}</td>
							@else
								<?php
								$bd = $latest_data->buy_price - $currency->latest_data->first()->buy_price;
								?>
								@if ($bd > 0)
								<td><i class="fa fa-arrow-up font-green"></i> {{$bd}}</td>
								@elseif ($bd == 0)
								<td>-</td>
								@else
								<td><i class="fa fa-arrow-down font-red"></i> {{abs($bd)}}</td>
								@endif
							@endif
							@endforeach

							<?php $i = 0; ?>
							@foreach($currency->latest_data as $latest_data)
							<?php $i++; ?>
							@if($i == 1)
								<td>{{$latest_data->sell_price}}</td>
							@else
								<?php
								$sd = $latest_data->sell_price - $currency->latest_data->first()->sell_price;
								?>
								@if ($sd > 0)
								<td><i class="fa fa-arrow-up font-green"></i> {{$sd}}</td>
								@elseif ($sd == 0)
								<td>-</td>
								@else
								<td><i class="fa fa-arrow-down font-red"></i> {{abs($sd)}}</td>
								@endif
							@endif
							@endforeach

						</tr>
						@endforeach
						</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- End Currency -->

      </div>
    </div>
@endsection

@section('headerPlugins')
{!! Minify::stylesheet('/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.css') !!}
{!! Minify::stylesheet('/themes/bootstrap/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css') !!}
{!! Minify::stylesheet('/themes/bootstrap/assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css') !!}
@endsection

@section('footerPlugins')
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js') !!}
{!! Minify::javascript('') !!}<!-- slider for products -->
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initOWL();
        RevosliderInit.initRevoSlider();
        Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
        Layout.initNavScrolling();
    });
</script>
<!-- BEGIN RevolutionSlider -->
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/frontend/pages/scripts/revo-slider-init.js') !!}
<!-- END RevolutionSlider -->

{!! Minify::javascript('/themes/bootstrap/assets/frontend/layout/scripts/layout.js') !!}
@endsection
