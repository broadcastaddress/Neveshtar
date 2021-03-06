@extends($theme_layout)

@section('content')

	<div class="container text-center">
		<a href="/{{Lang::getLocale()}}/automobile/{{$brand->slug}}"><img src="/uploads/images/c_{{$brand->main_image->url}}" alt="{{$brand->name}}"></a>
		<hr/>
		<h1>{{$brand->name}}</h1>
		<hr/>
	</div>

    <div class="main">
      <div class="container">
			<!-- Start Auto -->
			<div class="portlet">
				<div class="portlet-title">
					<div class="caption text-center">
						{{Lang::get('currency.automobile_prices')}}
					</div>
				</div>
				<div class="portlet-body">
					<div class="table-scrollable">
					<table class="table table-striped table-advance table-hover">
						<thead>
						<tr>
							<th width="25%">
								{{Lang::get('currency.automobile')}}
							</th>
							<th width="25%">
								{{Lang::get('currency.description')}}
							</th>
							<th width="25%">
								{{Lang::get('currency.main_price')}}
							</th>
							<th width="25%">
								{{Lang::get('currency.market_price')}}
							</th>
						</tr>
						</thead>
						<tbody>
						@foreach($brand->automobiles as $auto)
						<tr>
							<td class="highlight">{{$auto->name}}</td>
							<td>{{$auto->description}}</td>
							@if($auto->last_price->main_price > 0)
							<td>{{number_format($auto->last_price->main_price, 0, ".", ",")}}</td>
							@else
							<td>-</td>
							@endif
							@if($auto->last_price->market_price > 0)
							<td>{{number_format($auto->last_price->market_price, 0, ".", ",")}}</td>
							@else
							<td>-</td>
							@endif
						</tr>
						@endforeach
						</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- End Auto -->
      </div>
    </div>
@endsection

@section('headerPlugins')
@endsection

@section('footerPlugins')
<script type="text/javascript">
    jQuery(document).ready(function() {
    });
</script>
@endsection

