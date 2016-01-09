@extends('~layouts.datatable.actions')

@section('actions-items')
	<li>
		<a href="{!! route('facturi_by_type',['type' => '1','id' => $record->id]) !!}"><i class="fa fa-list text-blue">
	</i> <span class="text-blue">Raport Electricitate</span></a></li>
	<li>
		<a href="{!! route('facturi_by_type',['type' => '2','id' => $record->id]) !!}"><i class="fa fa-list text-blue">
	</i> <span class="text-blue">Raport Gaze Naurale</span></a></li>
	<li>
		<a href="{!! route('facturi_by_type',['type' => '3','id' => $record->id]) !!}"><i class="fa fa-list text-blue">
	</i> <span class="text-blue">Raport Apa</span></a></li>

@stop