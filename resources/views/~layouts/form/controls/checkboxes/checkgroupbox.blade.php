<div class="form-group{{$feedback ? ' has-' . $feedback : ''}}">
    @foreach($options as $i => $option)
        {{$option->out()}}
    @endforeach
</div>