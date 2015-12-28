<div class="row">
    <div class="col-md-4">
        {!! $controls[0]->out() !!}
        {!! $controls[1]->out() !!}
        {!! $controls[2]->out() !!}
        {!! $controls[8]->out() !!}
        {!! $controls[4]->out() !!}
		
    </div>
    <div class="col-md-4">
        {!! $controls[5]->out() !!}
        {!! $controls[6]->out() !!}
        {!! $controls[7]->out() !!}
        {!! $controls[3]->out() !!}
        {!! $controls[9]->out() !!}
		
    </div>
    <div class="col-md-4">
        {!! $controls[10]->out() !!}
        {!! $controls[11]->out() !!}
        {!! $controls[12]->out() !!}
        {!! $controls[13]->out() !!}

    </div>
 </div>
{!!
	Form::hidden('category_id', @$category_id, ['id' => 'category_id', 'class' => 'data-source', 'data-control-source' => 'category_id', 'data-control-type' => 'persistent'])
!!}