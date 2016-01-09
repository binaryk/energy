<div class="card bg-white m-b">
    <div class="card-header">Consum
        <a href="#" class="btn btn-default pull-right chart" id="frm_chart_modal_open_{!! @$year !!}">
            Genereaza grafic pentru anul {!! @$year !!}
        </a>
    </div>
    <div class="card-block p-a-0">
        <div class="table-responsive">
            <table class="table m-b-0">
                <thead>
                <tr>
                    <th class="col-md-5">
                        <span></span>Luna</th>
                    <th class="col-md-2">Consum</th>
                    <th class="col-md-2">Procent</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k => $luna)
                <tr>
                    <td>
                        <span></span>{!! trans('months.'.$k) !!}</td>
                    <td> {!! $luna !!} </td>
                    <td class="align-middle">
                        <div class="progress progress-sm m-a-0">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{!! $luna !!}" aria-valuemin="0" aria-valuemax="100" style="width: {!! $luna !!}%">
                                <span class="sr-only">{!! $luna !!}% </span>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>