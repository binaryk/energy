@extends ('backend.layouts.master')

@section ('title', trans('menus.organization_management'))

@section('page-header')
    <h1>
        {{ trans('menus.organization_management') }}
        <small>{{ trans('menus.active_organizations') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('menus.active_organizations') }}</h3> 
            <div class="box-tools pull-right">
                <div class="btn-group">
                    <a  type="button" class="btn btn-primary btn-xs" href="{{route('admin.organization.create')}}">Adauga</a>
                </div>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Denumire Organizatie</th>
                        <th>Adresa</th>
                        <th>Con de Identitate</th>
                        <th>Actiuni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($organizations as $organization)
                        <tr>
                            <td>{!! $organization->id !!}</td>
                            <td>{!! $organization->name !!}</td>
                            <td>{!! $organization->address !!}</td>
                            <td>{!! $organization->cui !!}</td>
                            <td>
                                
                            <a href="{{route('admin.organization.edit', $organization->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a> 

                            <a href="{{route('admin.organization.destroy', $organization->id)}}" data-method="post" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a> 

                            </td>
                           
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> 

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
