@if(count($urls) > 0)
<div id="breadcrumb" class="row">
	<div class="col-xs-12">
		<ol class="breadcrumb">
			@foreach($urls as $i => $item)
				@if($item['active'])
					<li><a href="{{ $item['url']}}">{{ $item['caption']}}</a></li>
				@else
					<li class="active">{{ $item['caption']}}</li>		
				@endif
			@endforeach
		</ol>
	</div>
</div>
@endif