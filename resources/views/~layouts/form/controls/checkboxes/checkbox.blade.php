<div class="checkbox">
	<label>
		{{Form::checkbox($name, $value, $checked, $attributes)}} {{$caption}}
	</label>
</div>
@if($help)
	<p class="help-block">{{$help}}</p>
@endif