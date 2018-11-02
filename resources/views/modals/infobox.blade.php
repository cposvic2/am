<div style="display: inline-block; overflow: auto; max-height: 610px; max-width: 654px;">
	<div style="overflow: auto;">
		<div class="noscrollbar">
			<h3 id="firstHeading" class="firstHeading">
				<a style="display:inline !important;" href="{{ $hotel->link }}" target="_blank">{{ $hotel->name }}</a>
			</h3>
			<div id="bodyContent"><p>{{ $hotel->address }}</p>
				<p>{{ $hotel->category->name }}, {{ $hotel->category->points }} {{ $hotel->brand->points_name }}<span><a class="problem-report-link" href="{{ url("/report/{$hotel->id}") }}" target="_blank">Not right?</a></span></p>
			</div>
		</div>
	</div>
</div>