@extends('~layouts.datatable.actions')

@section('actions-items')
	<li class="action-show-record"><a href="{!! route('contracts_index', ['counter_id' => $record->id,'id' => 'contract']) !!}"><i class="fa fa-list text-blue">
	</i> <span class="text-blue">Lista Contracte</span></a></li>
	<li class="divider"></li>

	<li class="action-show-record"><a href="{!! route('bills_index', ['counter_id' => $record->id,'id' => 'factura']) !!}"><i class="fa fa-list text-blue">
	</i> <span class="text-blue">Lista Facturi</span></a></li>
	
	<li class="divider"></li>
	<li class="action-update-record" data-id="{{$record->id}}"><a><i class="fa fa-edit">
	</i> <span>Editare</span></a></li>

	<li class="action-delete-record" data-id="{{$record->id}}"><a><i class="icon-trash text-red">
	</i> <span class="text-red">Ştergere</span></a></li>

	
@stop