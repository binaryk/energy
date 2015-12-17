@if($type == 'active')
	<div class="tab-pane fade active in" id="{!! @$view !!}">
		<p>
			 {!! @$content !!}
		</p>
	</div> 
@else
	@foreach($links as $k => $link)
		<div class="tab-pane fade" id="{!! @$link['view'] !!}">
			<p>
				 {!! @$link['content'] !!}
			</p>
		</div> 
	@endforeach

@endif