@extends('~layouts.template.layout')
@section('custom-styles')
  <link rel="stylesheet" href="{!! asset('template/vendor/datatables/media/css/jquery.dataTables.css')!!}">
@stop
@section('content')
    
  <div class="card bg-white">
    <div class="card-header">
      Gradinite:
    </div>
    <div class="card-block">
      <table class="table table-bordered table-condensed datatable m-b-0">
        <thead>
          <tr>
            <th>Denumirea Institutie</th>
            <th> </th>
          </tr>
        </thead>
      @foreach($institutions as $institution)
        <tr>
            <td>{{$institution->name}}</td>
            <td>
              <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </td>
        </tr>
       @endforeach 
      </table>
    </div>
  </div>

@stop
@section('custom-scripts')
    <script src="{!! asset('template/vendor/datatables/media/js/jquery.dataTables.js')!!}"></script>
    <script src="{!! asset('template/scripts/helpers/bootstrap-datatables.js')!!}"></script>
    <script type="text/javascript">
        $('.datatable').dataTable({
            // 'ajax': 'data/datatables-arrays.json'
        });
    </script>
@stop