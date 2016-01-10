<div class="row">
    <div class="col-md-4">
        {!! $controls[0]->out() !!}
        {!! $controls[4]->out() !!}
        {!! $controls[9]->options(['0' => '-- Selectati numarul contractului --'] + App\Models\Contract::byCounter($counter->id))->out() !!}
    </div>
    <div class="col-md-4">
        {!! $controls[1]->out() !!}
        {!! $controls[5]->out() !!}
        {!! $controls[7]->out() !!}
    </div>
    <div class="col-md-4">
        {!! $controls[2]->out() !!}
        {!! $controls[6]->out() !!}
        {!! $controls[3]->out() !!}
    </div>
    <div class="col-md-12">
        {!! $controls[8]->out() !!}
    </div>
</div>
{!!
    Form::hidden('counter_id', $counter->id, ['id' => 'counter_id', 'class' => 'data-source', 'data-control-source' => 'counter_id', 'data-control-type' => 'persistent'])
!!}