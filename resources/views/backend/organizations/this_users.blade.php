@extends ('backend.layouts.master')

@section ('title', 'Users list')

@section('page-header')
    <h1>
        Users List
    </h1>
@endsection

@section('content')
    <div class="box box-success"> 

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nume</th>
                        <th>E-mail</th>
                    </tr>
                    </thead>
                    <tbody>
	                    @foreach ($users as $user)
	                        <tr>
	                            <td>{!! $user->id !!}</td>
	                            <td>{!! $user->name !!}</td>
	                            <td>{!! $user->email !!}</td>
	                        </tr>
	                    @endforeach
                    </tbody>
                </table>
            </div> 
            <div class="pull-right">
                <a href="{{route('admin.organization')}}"  class="btn btn-xs btn-default"><i class="fa fa-arrow-left" data-toggle="tooltip" data-placement="top" title="Organization list"></i></a>
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
