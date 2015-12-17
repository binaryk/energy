<div class="btn-group btn-group-an-scolar-selection">
	<button type="button" class="btn btn-pink dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="selected-an-scolar" id="selected-an-scolar">An şcolar ({{$year->name}})</span>
	</button>
	<ul class="dropdown-menu">
		@foreach($years as $i => $item)
			<li><a data-id="{{$item->id}}" data-name="{{$item->name}}" href="#">{{ $item->name }}</a></li>
		@endforeach
	</ul>
</div>

<div class="btn-group btn-group-semestru-selection">
	<button type="button" class="btn btn-pink dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="selected-semestru" id="selected-semestru">Semestrul {{ $semester->name }}</span>
	</button>
	<ul class="dropdown-menu">
		@foreach($semestres as $i => $item)
			<li><a data-id="{{$item->id}}" data-name="{{$item->name}}" href="{{ URL::route('change-semester', ['semester_id' => $item->id ]) }}">{{ $item->name }} ({{$item->start}} - {{$item->end}})</a></li>
		@endforeach
	</ul>
</div>