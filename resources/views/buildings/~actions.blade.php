@extends('~layouts.datatable.actions')

@section('actions-items')
	<li class="action-show1-record" ng-click="counters('{!! str_replace('\\', '/', route('counters_index',['build_id' => $record->id,'id' => 'contoare']) ) !!}')"><a><i class="fa fa-list text-blue">
			</i> <span class="text-blue">Lista Contoare</span></a></li>
	<li class="divider"></li>
	<li class="action-update-record" data-id="{{$record->id}}"><a><i class="fa fa-edit">
	</i> <span>Editare</span></a></li>
	<li class="action-delete-record" data-id="{{$record->id}}"><a><i class="fa fa-eraser text-red">
	</i> <span class="text-red">Ştergere</span></a></li>
@stop