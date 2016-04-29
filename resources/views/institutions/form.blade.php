<div class="row">
    <div class="col-md-8">
        {!! $controls[0]->out() !!} 
		
    </div>
    <div class="col-md-4">
        {!! $controls[1]->out() !!} 
		
    </div> 
</div>
{!!
	Form::hidden('category_id', @$category_id, ['id' => 'category_id', 'class' => 'data-source', 'data-control-source' => 'category_id', 'data-control-type' => 'persistent'])
!!}