<div class="input-group{{$groupsize ? ' ' . $groupsize : ''}}{{$feedback ? ' has-' . $feedback : ''}}">
    <div class="input-group-btn">
        <button type="button" class="btn {{$buttonclass}} {{count($options) ? 'dropdown-toggle' : ''}}" {{count($options) ? 'data-toggle="dropdown"' : ''}}>
            {{$caption}} 
            @if( count($options) > 0)
                <span class="fa fa-caret-down"></span>
            @endif
        </button>
        @if( count($options) > 0)
            <ul class="dropdown-menu">
                @foreach($options as $i => $option)
                    {{ $option->out() }}
                @endforeach
            </ul>
        @endif
    </div><!-- /btn-group -->
    {{ Form::text($name, $value, $attributes) }}
</div>
@if($help)
    <p class="help-block">{{$help}}</p>
@endif