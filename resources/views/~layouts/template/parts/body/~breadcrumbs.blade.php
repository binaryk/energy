<ol class="breadcrumb">
	<li>
		<a href="{{URL::to('/') }}">
			<i class="icon-home"></i>
			Acasă</a>

	</li>
@if( isset($breadcrumbs) )
	@foreach($breadcrumbs as $key => $breadcrumb)
		<li>
			<a href="{!! route($breadcrumb['route'], $breadcrumb['ids']) !!}">{!! $breadcrumb['name'] !!}</a>
			@if( $key < count($breadcrumbs) - 1 )
				<i class="fa fa-angle-right"></i>
			@endif
		</li>
	@endforeach
	@endif
</ol>