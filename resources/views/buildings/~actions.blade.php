@extends('~layouts.datatable.actions')

@section('actions-items')
	<li class="action-update-record" data-id="{{$record->id}}"><a><i class="fa fa-edit">
	</i> <span>Editare</span></a></li>


	<li class="action-delete-record" data-id="{{$record->id}}"><a><i class="fa fa-eraser text-red">
	</i> <span class="text-red">Ştergere</span></a></li>

	<li class="action-show1-record" ><a href="{{URL('/contoare') }}"><i class="fa fa-list text-blue">
	</i> <span class="text-blue">Lista Contoare</span></a></li>
@stop