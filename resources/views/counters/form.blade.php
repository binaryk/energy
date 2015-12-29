<div class="row">
    <div class="col-md-4">
        {!! $controls[0]->out() !!}
    </div>
 </div>
{!!
	Form::hidden('build_id', $build->id, ['id' => 'build_id', 'class' => 'data-source', 'data-control-source' => 'build_id', 'data-control-type' => 'persistent'])
!!}