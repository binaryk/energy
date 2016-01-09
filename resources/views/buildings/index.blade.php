@extends('~layouts.datatable.index')

@section('custom-styles')
@stop

@section('content')
    @parent
@stop


@section('datatable-specific-page-jquery-initializations')
@parent
$(function() {
	$( ".datepicker" ).datepicker();
});

$( "#da" ).click(function() {
	{{-- alert(1); --}}
 	$(".apa_calda").show();
});
 
$( "#nu" ).click(function() {
{{-- alert(1); --}}
  $(".apa_calda").hide();
});

@stop