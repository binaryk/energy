@extends('~layouts.datatable.actions')

@section('actions-items')
	<li class="action-show-record" data-id="{{$record->id}}"><a href="{!! route('consumptions_index', ['vehicle_id' => $record->id,'id' => 'consum']) !!}"><i class="fa fa-list text-blue">
	</i> <span class="text-blue">Lista Consum</span></a></li>
	<li class="divider"></li>
	<li class="action-update-record" data-id="{{$record->id}}"><a><i class="fa fa-edit">
	</i> <span>Editare</span></a></li>
	<li class="action-delete-record" data-id="{{$record->id}}"><a><i class="icon-trash text-red">
	</i> <span class="text-red">Ştergere</span></a></li>
@stop