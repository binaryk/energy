@extends('~layouts.datatable.index')

@section('custom-styles')
@stop

@section('content')
    @parent
@stop


@section('datatable-specific-page-jquery-initializations')
@parent
$(function() {
	$( ".datepicker" ).datepicker({
        autoclose: true
    });
});
@stop