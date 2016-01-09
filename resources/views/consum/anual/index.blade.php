@extends('~layouts.template.layout')
@section('title')
    Consum institutii anual
@endsection

@section('content')
    @include('consum.anual.content')
@endsection

@section('custom-scripts')
    @include('consum.anual.js')
@endsection

@section('custom-styles')
    @include('consum.lunar.css')
@endsection