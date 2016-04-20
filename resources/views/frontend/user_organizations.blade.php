@extends('~layouts.template.layout')
@section('content')
	<h3 style="text-align: center;">Alegeti Organizatia Manageriata</h3><br> 
    <div class="row">  
    	
		@foreach($organizations as $organization)
        <div class="col-md-4">
	        <div class="card bg-white" style=" border-radius: 8px 8px 8px 8px;">
	            <div class="card-header bg-success text-white" style="background-color: #4F646E; border-radius: 8px 8px 0 0;"></div>
	            <div class="card-block text-center">
		            <div class="bounce" data-percent="86">
		                <div>
			              <a href="{{route('user.oragnization_id',['id'=>$organization->id])}}" type="button" id="" title="Alegeti Organizatia" class="set_organization glyphicon glyphicon-folder-open" style="border: 1px solid #00adde; padding: 22px 22px; border-radius: 100%; color: #00adde; font-size: 29px; width:  height: 77px;"></a>
			            </div><br>
		                {{$organization->name}}
			         </div>
	            </div>
	        </div>
        </div>
		@endforeach

    </div>  
@stop  