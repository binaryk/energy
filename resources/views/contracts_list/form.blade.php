<div class="row">
	<div class="col-md-2">
		
	</div>
    <div class="col-md-4">
        {!! $controls[0]->out() !!}
    </div>
    <div class="col-md-4">
        {!! $controls[1]->out() !!}
    </div>
</div>
{!!
    Form::hidden('counter_id', $counter->id, ['id' => 'counter_id', 'class' => 'data-source', 'data-control-source' => 'counter_id', 'data-control-type' => 'persistent'])
!!}