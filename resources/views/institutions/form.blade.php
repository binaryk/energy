<div class="row">
    <div class="col-md-12">
        {!! $controls[0]->out() !!}
    </div>
 </div>
{!!
	Form::hidden('category_id', @$category_id, ['id' => 'category_id', 'class' => 'data-source', 'data-control-source' => 'category_id', 'data-control-type' => 'persistent'])
!!}