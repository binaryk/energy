@extends('~layouts.template.layout')
@section('title')
    Consum institutii lunar
@endsection

@section('content')
    {!! $tabs !!}
@endsection

@section('custom-scripts')
    @include('consum.lunar.js',['all' => $all])
@endsection

@section('custom-styles')
    @include('consum.lunar.css')
@endsection