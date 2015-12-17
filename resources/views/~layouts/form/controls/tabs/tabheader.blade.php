@if($type == 'active')
<li class="{!! @$type !!}">
	<a href="#{!! @$view !!}" data-toggle="tab">
	{!! @$title !!} </a>
</li> 
@else
<li class="{!! @$type !!}">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	{!! @$title !!} <i class="fa fa-angle-down"></i>
	</a>
	<ul class="dropdown-menu" role="menu">
		@foreach($links as $k => $link)
		<li>
			<a href="#{!! @$link['view'] !!}" tabindex="-1" data-toggle="tab">
			{!! @$link['title'] !!} </a>
		</li> 
		@endforeach
	</ul>
</li>
@endif

