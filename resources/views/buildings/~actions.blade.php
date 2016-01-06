@extends('~layouts.datatable.actions')

@section('actions-items')
	<li class="action-show1-record"><a href="{!! route('counters_index',['build_id' => $record->id,'id' => 'contoare']) !!}"><i class="fa fa-list text-blue">
			</i> <span class="text-blue">Lista Contoare</span></a></li>
	<li class="divider"></li>
	<li class="action-update-record" data-id="{{$record->id}}"><a><i class="fa fa-edit">
	</i> <span>Editare</span></a></li>
	<li class="action-delete-record" data-id="{{$record->id}}"><a><i class="icon-trash text-red">
	</i> <span class="text-red">Ştergere</span></a></li>
@stop