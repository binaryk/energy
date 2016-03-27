@extends ('backend.layouts.master')

@section ('title', trans('menus.organization_management') . ' | ' . trans('menus.create_organization'))

@section('page-header')
    <h1>
        {{ trans('menus.organization_management') }}
        <small>{{ trans('menus.create_organization') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.organization.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
        
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('menus.create_organization') }}</h3> 
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->
                <div class="form-group">
                    {!! Form::label('address', 'Adresa', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('address', null, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->
                 <div class="form-group">
                    {!! Form::label('cui', 'Cod de identitate', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('cui', null,  ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{route('admin.organization')}}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
                </div>
                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {!! Form::close() !!}
@stop 
