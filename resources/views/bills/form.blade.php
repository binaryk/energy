<div class="row">
    <div class="col-md-3">
        {!! $controls[0]->out() !!}
        {!! $controls[4]->out() !!}
    </div>
    <div class="col-md-3">
        {!! $controls[1]->out() !!}
        {!! $controls[5]->out() !!}
    </div>
    <div class="col-md-3">
        {!! $controls[2]->out() !!}
        {!! $controls[6]->out() !!}
    </div>
    <div class="col-md-3">
        {!! $controls[3]->out() !!}
        {!! $controls[7]->out() !!}
    </div>
    <div class="col-md-12">
        {!! $controls[8]->out() !!}
    </div>
</div>
{!!
    Form::hidden('counter_id', $counter->id, ['id' => 'counter_id', 'class' => 'data-source', 'data-control-source' => 'counter_id', 'data-control-type' => 'persistent'])
!!}