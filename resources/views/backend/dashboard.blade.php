@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Panel administrare
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Bine ai venit {!! auth()->user()->name !!}!</h3>
          <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            @include('backend.lang.' . app()->getLocale() . '.welcome')
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection