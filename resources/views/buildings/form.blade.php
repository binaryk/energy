<div class="row">
    <div class="col-md-6">
        {!! $controls[0]->out() !!}
    </div>
 	<div class="col-md-4">
        {!! $controls[1]->out() !!}
    </div>
    <div class="col-md-2">
        {!! $controls[2]->out() !!}
    </div>
 </div>
{!!
	Form::hidden('institution_id', $institution->id, ['id' => 'institution_id', 'class' => 'data-source', 'data-control-source' => 'institution_id', 'data-control-type' => 'persistent'])
!!}