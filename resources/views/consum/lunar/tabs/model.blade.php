<div class="tab-pane {!! $class !!}" id="{!! $id !!}">
   @include('consum.lunar.content',['data' => $data['months'], 'year' => $id ])
    @include('consum.lunar.tabs.js',['data' => $data['months'], 'year' => $id ])

     {!!
        \System\Modal::make('~layouts/commons/modal')
        ->id('frm_chart_lunar_'.$id)
        ->caption('Chart pe anul '. $id)
        ->closable(true)
        ->body('<div id="frm_chart_lunar_inner_'.$id.'">' . view('consum.lunar.chart')->with(['id'=>$id])->render() . '</div>')
        ->footer('<button type="button" class="btn btn-default" data-dismiss="modal">Renunţă</button>')
        ->out()
      !!}
</div>