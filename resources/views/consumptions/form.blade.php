<div class="row">
    <div class="col-md-3">
        {!! $controls[0]->out() !!}
    </div>
    <div class="col-md-3">
        {!! $controls[1]->out() !!}
    </div>
    <div class="col-md-3">
        {!! $controls[2]->out() !!}
    </div>
    <div class="col-md-3">
        {!! $controls[3]->out() !!}
    </div>
</div>
{!!
    Form::hidden('vehicle_id', $vehicle->id, ['id' => 'vehicle_id', 'class' => 'data-source', 'data-control-source' => 'vehicle_id', 'data-control-type' => 'persistent'])
!!}