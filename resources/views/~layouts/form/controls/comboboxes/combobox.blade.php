<div class="form-group{!!$feedback ? ' has-' . $feedback : ''!!}">
	@if($caption)
		<label class="control-label" for="{{$name}}">{!!$caption!!}</label>
	@endif
	{!! Form::select($name, $options, $value, $attributes + $angular) !!}
</div>