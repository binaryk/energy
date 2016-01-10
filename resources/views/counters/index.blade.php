@extends('~layouts.datatable.index')
@section('title')
    Contoare
@endsection

@section('datatable-specific-page-jquery-initializations')

    $('#type_utility_id').on('change', function(e){
        var id = $(this).val();
        var combobox = new COMBOBOX({
        'url'     : "{!! route('get_furnizor_by_utilitate') !!}",
        'id'      : id,
        'control' : '#provider_id',
        'model'   : '\\App\\Models\\Counter',
        'field'   : 'name'
        });
        combobox.populate(0);
    });


@stop