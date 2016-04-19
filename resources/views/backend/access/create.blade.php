@extends ('backend.layouts.master')

@section ('title', trans('menus.user_management') . ' | ' . trans('menus.create_user'))

@section ('before-styles-end')
<link rel="stylesheet" href="{!! asset('css/plugins/bootstrap-multiselect.css')!!}">
<link rel="stylesheet" href="{!! asset('js/plugins//select2/select2.css')!!}">
@stop

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.create_user') }}</small>
    </h1>
@endsection 

@section('content')
    {!! Form::open(['route' => 'admin.access.users.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('menus.create_user') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.header-buttons')
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('strings.full_name')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.email')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('password', trans('validation.attributes.password'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('password_confirmation', trans('validation.attributes.password_confirmation'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->
                    

                <div class="form-group">
                    {!! Form::label('organizations_user', 'Organization' , ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10"> 
                        <select id="organizations_user" name="organizations_user[]" multiple="multiple">
                            @foreach($organizations_user as $organization)
                                <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.active') }}</label>
                    <div class="col-lg-1">
                        <input type="checkbox" value="1" name="status" checked="checked" />
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.confirmed') }}</label>
                    <div class="col-lg-1">
                        <input type="checkbox" value="1" name="confirmed" checked="checked" />
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.send_confirmation_email') }}<br/>
                        <small>{{ trans('strings.if_confirmed_is_off') }}</small>
                    </label>
                    <div class="col-lg-1">
                        <input type="checkbox" value="1" name="confirmation_email" />
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.associated_roles') }}</label>
                    <div class="col-lg-3">
                        @if (count($roles) > 0)
                            @foreach($roles as $role)
                                <input type="checkbox" value="{{$role->id}}" name="assignees_roles[]" id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{!! $role->name !!}</label> <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">(<span class="show-hide">Show</span> Permissions)</a><br/>

                                <div class="permission-list hidden" data-role="role_{{$role->id}}">
                                    @if ($role->all)
                                        All Permissions<br/><br/>
                                    @else
                                        @if (count($role->permissions) > 0)
                                            <blockquote class="small">{{--
                                        --}}@foreach ($role->permissions as $perm){{--
                                            --}}{{$perm->display_name}}<br/>
                                                @endforeach
                                            </blockquote>
                                        @else
                                            No Permissions<br/><br/>
                                        @endif
                                    @endif
                                </div><!--permission list-->
                            @endforeach
                        @else
                            No Roles to set
                        @endif
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.other_permissions') }}</label>
                    <div class="col-lg-10">
                        <div class="alert alert-info">
                            <i class="fa fa-info-circle"></i> Checking a permission will also check its dependencies, if any.
                        </div><!--alert-->

                        @if (count($permissions))
                            @foreach (array_chunk($permissions->toArray(), 10) as $perm)
                                <div class="col-lg-3">
                                    <ul style="margin:0;padding:0;list-style:none;">
                                        @foreach ($perm as $p)

                                            <?php
                                            //Since we are using array format to nicely display the permissions in rows
                                            //we will just manually create an array of dependencies since we do not have
                                            //access to the relationship to use the lists() function of eloquent
                                            //but the relationships are eager loaded in array format now
                                            $dependencies = [];
                                            $dependency_list = [];
                                            if (count($p['dependencies'])) {
                                                foreach ($p['dependencies'] as $dependency) {
                                                    array_push($dependencies, $dependency['dependency_id']);
                                                    array_push($dependency_list, $dependency['permission']['display_name']);
                                                }
                                            }
                                            $dependencies = json_encode($dependencies);
                                            $dependency_list = implode(", ", $dependency_list);
                                            ?>

                                            <li><input type="checkbox" value="{{$p['id']}}" name="permission_user[]" data-dependencies="{!! $dependencies !!}" id="permission-{{$p['id']}}"> <label for="permission-{{$p['id']}}" />

                                                @if ($p['dependencies'])
                                                    <a style="color:black;text-decoration:none;" data-toggle="tooltip" data-html="true" title="<strong>Dependencies:</strong> {!! $dependency_list !!}">{!! $p['display_name'] !!} <small><strong>(D)</strong></small></a>
                                                @else
                                                    {!! $p['display_name'] !!}
                                                    @endif

                                                    </label></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            No Other Permissions
                        @endif
                    </div><!--col 3-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{route('admin.access.users.index')}}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
                </div>
                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {!! Form::close() !!}
@stop

@section('before-scripts-end')
@parent
    <script src="{!! asset('js/backend/access/permissions/script.js') !!}"></script>
    <script src="{!! asset('js/backend/access/users/script.js') !!}"></script>

    <script src="{!! asset('js/plugins/bootstrap-multiselect.js') !!}"></script>
    <script src="{!! asset('js/plugins/select2/select2.js') !!}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#organizations_user').multiselect();

        });
    </script>
@stop