<div class="row">
    <div class="col-md-6">
        {!! $controls[0]->out() !!}
        {!! $controls[1]->out() !!}
    </div>
    <div class="col-md-6">
        {!! $controls[3]->out() !!}
        {!! $controls[2]->out() !!}
    </div>
 </div>
{!!
	Form::hidden('build_id', $build->id, ['id' => 'build_id', 'class' => 'data-source', 'data-control-source' => 'build_id', 'data-control-type' => 'persistent'])
!!}