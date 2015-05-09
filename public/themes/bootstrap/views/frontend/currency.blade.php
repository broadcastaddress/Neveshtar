@extends($theme_layout)

@section('content')
    <div class="main">
      <div class="container">
      	<h1>{{Lang::get('currency.rate')}} {{Lang::get('currency.rial')}} {{Lang::get('currency.with')}} {{Lang::get('currency.'.$currency->symbol.'')}}</h1>
		<!-- Start Currency -->
		<div class="portlet">
			<div class="portlet-body">
				<div>
					<table class="table table-striped table-advance table-hover">
					<thead>
					<tr>
						<th width="25%">
							{{Lang::get('currency.currency')}}
						</th>
						<th width="15%">
							{{Lang::get('currency.central_bank')}}
						</th>
						<th width="17%">
							{{Lang::get('currency.buy_price')}}
						</th>
						<th width="13%">
							{{Lang::get('currency.buy_difference')}}
						</th>
						<th width="17%">
							{{Lang::get('currency.sell_price')}}
						</th>
						<th width="13%">
							{{Lang::get('currency.sell_difference')}}
						</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td class="highlight">
							<img src="/themes/bootstrap/assets/global/img/flags/{{$currency->country}}.png">
							{{Lang::get('currency.'.$currency->symbol.'')}}
						</td>
						@if($currency->children)
						<td>
						<?php $central_bank = $currency->children->latest_data->first()->sell_price / $currency->children->amount; ?>
						{{str_replace(".00", "", (string)number_format ($central_bank, 2, ".", ","))}}
						</td>
						@else
							<td>-</td>
						@endif
						<?php $i = 0; ?>
						@foreach($currency->latest_data as $latest_data)
						<?php $i++; ?>
						@if($i == 1)
							<td>{{str_replace(".00", "", (string)number_format ($latest_data->buy_price, 2, ".", ","))}}</td>
						@else
							<?php
							$bd = $latest_data->buy_price - $currency->latest_data->first()->buy_price;
							?>
							@if ($bd > 0)
							<td><i class="fa fa-arrow-down font-red"></i> {{$bd}}</td>
							@elseif ($bd == 0)
							<td>-</td>
							@else
							<td><i class="fa fa-arrow-up font-green"></i> {{abs($bd)}}</td>
							@endif
						@endif
						@endforeach

						<?php $i = 0; ?>
						@foreach($currency->latest_data as $latest_data)
						<?php $i++; ?>
						@if($i == 1)
							<td>{{str_replace(".00", "", (string)number_format ($latest_data->sell_price, 2, ".", ","))}}</td>
						@else
							<?php
							$sd = $latest_data->sell_price - $currency->latest_data->first()->sell_price;
							?>
							@if ($sd > 0)
							<td><i class="fa fa-arrow-down font-red"></i> {{$sd}}</td>
							@elseif ($sd == 0)
							<td>-</td>
							@else
							<td><i class="fa fa-arrow-up font-green"></i> {{abs($sd)}}</td>
							@endif
						@endif
						@endforeach

					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- End Currency -->

		<!-- BEGIN Portlet PORTLET-->
		@if($currency->children)
		<div class="portlet bg-inverse light">
			<div class="portlet-title">
				<div class="caption">
					<span class="caption-subject bold uppercase">
					<img src="/themes/bootstrap/assets/global/img/flags/{{$currency->country}}.png">
					{{Lang::get('currency.rate')}} {{Lang::get('currency.rial')}} {{Lang::get('currency.with')}} {{Lang::get('currency.'.$currency->symbol.'')}}
					</span>
				</div>
				<div class="actions">
					<a href="javascript:;" class="btn btn-circle btn-default btn-icon-only fullscreen"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="chartdiv" class="amcharts-currencypage">
				</div>
			</div>
		</div>
		@endif
		<!-- END Portlet PORTLET-->


		<!-- BEGIN Portlet PORTLET-->
		<div class="portlet bg-inverse light">
			<div class="portlet-title">
				<div class="caption">
					<span class="caption-subject bold uppercase">
					<img src="/themes/bootstrap/assets/global/img/flags/{{$currency->country}}.png">
					{{Lang::get('currency.rate')}} {{Lang::get('currency.rial')}} {{Lang::get('currency.with')}} {{Lang::get('currency.'.$currency->symbol.'')}} ({{Lang::get('currency.central_bank')}})
					</span>
				</div>
				<div class="actions">
					<a href="javascript:;" class="btn btn-circle btn-default btn-icon-only fullscreen"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="chartdiv2" class="amcharts-currencypage">
				</div>
			</div>
		</div>
		<!-- END Portlet PORTLET-->



      	<h1>{{Lang::get('currency.currency_rates')}}</h1>
		<!-- Start Currency -->
		<div class="portlet">
			<div class="portlet-body">
				<div class="table-scrollable">
					<table class="table table-striped table-advance table-hover">
					<thead>
					<tr>
						<th width="25%">
							{{Lang::get('currency.currency')}}
						</th>
						<th width="12%">
							{{Lang::get('currency.central_bank')}}
						</th>
						<th width="17%">
							{{Lang::get('currency.buy_price')}}
						</th>
						<th width="13%">
							{{Lang::get('currency.buy_difference')}}
						</th>
						<th width="17%">
							{{Lang::get('currency.sell_price')}}
						</th>
						<th width="13%">
							{{Lang::get('currency.sell_difference')}}
						</th>
						<th width="3%">
							{{Lang::get('currency.chart')}}
						</th>
					</tr>
					</thead>
					<tbody>
						@foreach($currencies as $other_currency)
						<tr>
							<td class="highlight">
								<a href="/{{Lang::getLocale()}}/currencies/{{$other_currency->slug}}">
									<img src="/themes/bootstrap/assets/global/img/flags/{{$other_currency->country}}.png">
									{{Lang::get('currency.'.$other_currency->symbol.'')}}
								</a>
							</td>
							@if($other_currency->children)
							<td>
							<?php $central_bank = $other_currency->children->latest_data->first()->sell_price / $other_currency->children->amount; ?>
							{{str_replace(".00", "", (string)number_format ($central_bank, 2, ".", ","))}}
							</td>
							@else
								<td>-</td>
							@endif
							<?php $i = 0; ?>
							@foreach($other_currency->latest_data as $latest_data)
							<?php $i++; ?>
							@if($i == 1)
								<td>{{str_replace(".00", "", (string)number_format ($latest_data->buy_price, 2, ".", ","))}}</td>
							@else
								<?php
								$bd = $latest_data->buy_price - $other_currency->latest_data->first()->buy_price;
								?>
								@if ($bd > 0)
								<td><i class="fa fa-arrow-down font-red"></i> {{$bd}}</td>
								@elseif ($bd == 0)
								<td>-</td>
								@else
								<td><i class="fa fa-arrow-up font-green"></i> {{abs($bd)}}</td>
								@endif
							@endif
							@endforeach

							<?php $i = 0; ?>
							@foreach($other_currency->latest_data as $latest_data)
							<?php $i++; ?>
							@if($i == 1)
								<td>{{str_replace(".00", "", (string)number_format ($latest_data->sell_price, 2, ".", ","))}}</td>
							@else
								<?php
								$sd = $latest_data->sell_price - $other_currency->latest_data->first()->sell_price;
								?>
								@if ($sd > 0)
								<td><i class="fa fa-arrow-down font-red"></i> {{$sd}}</td>
								@elseif ($sd == 0)
								<td>-</td>
								@else
								<td><i class="fa fa-arrow-up font-green"></i> {{abs($sd)}}</td>
								@endif
							@endif
							@endforeach
								<td class="text-center">
									<a href="/{{Lang::getLocale()}}/currencies/{{$other_currency->slug}}">
										<i class="fa fa-bar-chart-o"></i>
									</a>
								</td>
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
{!! Minify::stylesheet('/themes/bootstrap/assets/global/plugins/amcharts/amstockcharts/style.css') !!}
{!! Minify::stylesheet('/themes/bootstrap/assets/global/plugins/amcharts/amcharts/plugins/export/export.css') !!}
@endsection

@section('footerPlugins')
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/amcharts/amcharts/amcharts.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/amcharts/amcharts/serial.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/amcharts/amcharts/plugins/export/export.min.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/amcharts/amcharts/plugins/dataloader/dataloader.min.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/amcharts/amstockcharts/themes/light.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/amcharts/amstockcharts/amstock.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js') !!}
{!! Minify::javascript('/themes/bootstrap/assets/global/scripts/metronic.js') !!}
<script type="text/javascript">
    jQuery(document).ready(function() {
	    Metronic.init();
        Layout.init();
        Layout.initOWL();
        Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
        Layout.initNavScrolling();
    });

var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "pathToImages": "/themes/bootstrap/assets/global/plugins/amcharts/amcharts/images/",
	"dataLoader": {
		"url": "/{{Lang::getLocale()}}/ccharts/{{$currency->id}}/50",
		"format": "json"
	},
    "valueAxes": [{
    	"id": "v1",
        "position": "left",
        "guides": [{
            "dashLength": 6,
            "inside": true,
            "label": "{{Lang::get('currency.sell_average')}} - {{number_format($currency_sell_median,0,'.',',')}}",
            "lineAlpha": 1,
            "value": {{$currency_sell_median}},
        },{
            "dashLength": 6,
            "inside": true,
            "label": "{{Lang::get('currency.buy_average')}} - {{number_format($currency_buy_median,0,'.',',')}}",
            "lineAlpha": 1,
            "value": {{$currency_buy_median}},
        }],
    },{
    	"id": "v2",
        "position": "left",
    }],
    "graphs": [{
        "id": "v1",
        "fillAlphas": 0.4,
        "valueField": "sell_price",
        "title": "{{Lang::get('currency.sell_price')}}",
         "balloonText": "<div style='margin:5px; font-size:19px;'>{{Lang::get('currency.sell_price')}}:<b>[[value]]</b></div>",
		 "bullet": "round",
    },{
        "id": "v2",
        "fillAlphas": 0.4,
        "valueField": "buy_price",
        "title": "{{Lang::get('currency.buy_price')}}",
         "balloonText": "<div style='margin:5px; font-size:19px;'>{{Lang::get('currency.buy_price')}}:<b>[[value]]</b></div>",
		 "bullet": "round",
    }],
    "chartScrollbar": {
        "graph": "v1",
        "scrollbarHeight": 60,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0.2,
        "selectedGraphLineAlpha": 1,
        "color": "#AAAAAA",
    },
    "chartCursor": {
        "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
        "cursorPosition": "mouse"
    },
    "categoryField": "date",
    "categoryAxis": {
        "minPeriod": "mm",
        "parseDates": false,
        "equalSpacing": true,
        "labelRotation": 90,
    },
    "legend": {
        "useGraphSettings": true,
        "markerSize": 20,
        "valueWidth": 0,
        "verticalGap": 0,
    },
    "export": {
        "enabled": true,
        "libs": {
            "path": "/themes/bootstrap/assets/global/plugins/amcharts/amcharts/plugins/export/libs/"
        }
    }
});

var chart = AmCharts.makeChart("chartdiv2", {
    "type": "serial",
    "theme": "light",
    "pathToImages": "/themes/bootstrap/assets/global/plugins/amcharts/amcharts/images/",
	"dataLoader": {
		"url": "/{{Lang::getLocale()}}/ccharts/{{$currency->central_bank}}/50",
		"format": "json"
	},
    "valueAxes": [{
    	"id": "v1",
        "position": "left",
        "guides": [{
            "dashLength": 6,
            "inside": true,
            "label": "{{Lang::get('currency.sell_average')}} - {{number_format($currency_sell_median,0,'.',',')}}",
            "lineAlpha": 1,
            "value": {{$currency_sell_median}},
        }],
    },{
    	"id": "v2",
        "position": "left",
    }],
    "graphs": [{
        "id": "v1",
        "fillAlphas": 0.4,
        "valueField": "sell_price",
        "title": "{{Lang::get('currency.sell_price')}}",
         "balloonText": "<div style='margin:5px; font-size:19px;'>{{Lang::get('currency.sell_price')}}:<b>[[value]]</b></div>",
		 "bullet": "round",
    }],
    "chartScrollbar": {
        "graph": "v1",
        "scrollbarHeight": 60,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0.2,
        "selectedGraphLineAlpha": 1,
        "color": "#AAAAAA",
    },
    "chartCursor": {
        "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
        "cursorPosition": "mouse"
    },
    "categoryField": "date",
    "categoryAxis": {
        "minPeriod": "mm",
        "parseDates": false,
        "equalSpacing": true,
        "labelRotation": 90,
    },
    "legend": {
        "useGraphSettings": true,
        "markerSize": 20,
        "valueWidth": 0,
        "verticalGap": 0,
    },
    "export": {
        "enabled": true,
        "libs": {
            "path": "/themes/bootstrap/assets/global/plugins/amcharts/amcharts/plugins/export/libs/"
        }
    }
});

</script>

{!! Minify::javascript('/themes/bootstrap/assets/frontend/layout/scripts/layout.js') !!}
@endsection

