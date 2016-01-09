@extends('~layouts.datatable.index')

@section('custom-styles')
@stop

@section('content')
    @parent
@stop

@section('custom-scripts')
    @parent
    <script src="{!! asset('custom/js/monitorizare/Monitorizare.js') !!}"></script>
    <script>
        _config['facturi'] = "{!! route('facturi_by_type') !!}";
    </script>
@endsection
@section('datatable-specific-page-jquery-initializations')
@parent
var mc = new App.Monitorizare.Monitorizare();
mc.init();
@stop