<div class="form-group{!!$feedback ? ' has-' . $feedback : ''!!}">
    {!! Form::radio($name, $value, $checked, $attributes + $angular) !!}
	@if( ! empty($caption) )
		<label class="control-label" for="{{$id}}">
			@if($feedback == Easy\Form\Base::FEEDBACK_SUCCESS)
				<i class="fa fa-check"></i>
			@elseif($feedback == Easy\Form\Base::FEEDBACK_WARNING)
				<i class="fa fa-bell-o"></i>
			@elseif($feedback == Easy\Form\Base::FEEDBACK_ERROR)
				<i class="fa fa-times-circle-o"></i>
			@endif
			{!! $caption !!}
		</label>
    @endif
    @if($help)
		<p class="help-block">{!!$help!!}</p>
	@endif
</div> 