<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-block p-a-0">
        <div class="box-tab vertical m-b-0">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">General</a></li>
            <li><a href="#tab2" data-toggle="tab">Anvelopa</a></li>
            <li><a href="#tab3" data-toggle="tab">Incalzire</a></li>
            <li><a href="#tab4" data-toggle="tab">Apa Calda</a></li>
          </ul>
          <div class="tab-content" style="width: 100%">
            <div class="tab-pane active in" id="tab1">
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
                    {!! $controls[9]->out() !!}
                </div>
                <div class="col-md-4">
                    {!! $controls[10]->out() !!}
                    {!! $controls[11]->out() !!}
                    {!! $controls[12]->out() !!}
                    {!! $controls[13]->out() !!}
                </div>
            </div>
                @include('buildings.building_features.~form-tire')  
                @include('buildings.building_features.~form-heating')  
                @include('buildings.building_features.~form-warm-water')  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{!!
    Form::hidden('institution_id', $institution->id, ['id' => 'institution_id', 'class' => 'data-source', 'data-control-source' => 'institution_id', 'data-control-type' => 'persistent'])
!!}
