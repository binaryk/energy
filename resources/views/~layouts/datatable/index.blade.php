@extends ('layouts.master')

@section('content')

@yield('before-table-row')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-solid box-default box-dt" id="box-{{$dt->id()}}">
			@if( $dt->caption() )
				<div class="box-header">
					<div class="row">
						<div class="col-xs-12">
							<h3 class="box-title">{!! $dt->caption() !!}</h3>
							<div class="title-actions pull-right">@yield('header-actions')</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<!-- toolbar -->
					@if( ! empty($toolbar) )
					<div class="row">
						<div class="col-xs-12">
							<div style="border-top:1px solid #d2d6de; padding-top:1px" class="dt-toolbar-container">{{$toolbar}}</div>
						</div>
					</div>
					@endif <!-- /toolbar -->
		        </div><!-- /.box-header -->
			@endif 
	@yield('inner-dt')
			<div class="box-body">
				<!-- Message --><div id="dt-action-message"></div><!-- /Message -->
				<!-- Filter --><div class="dt-filter-row row"><div class="col-xs-12">@yield('filter-form')</div></div><!-- /Filter -->
				<!-- Insert/Update/Delete Form -->
				@if($form)
				<div class="dt-form-container" id="form-{{$dt->id()}}">
					<div class="row">
						<div class="col-xs-12">
							<div class="box box-solid box-default">
								<div class="box-header"><h3 id="action-title" class="box-title">-</h3>
									<div class="box-tools pull-right">
                    					<button class="btn btn-sm btn-close-form" data-widget="remove"><i class="fa fa-times"></i></button>
                  					</div>
								</div>
								<div class="box-body">{!!$form->showForm()!!}</div>
								<div class="box-footer">
									<div class="row">
										<div class="col-xs-12">
											<button data-action="" class="btn btn-primary btn-do-action">Primary</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
				<!-- Form -->
				<!-- datatable -->{!! $dt->table() !!}<!-- /datatable -->
				@yield('datatable-summary')
			</div>
		</div>
	</div>
</div>
@stop

@section('custom-styles')
	{!! $dt->styles() !!}
@stop

@section('custom-scripts')
	{!! $dt->scripts() !!}
	{!! HTML::script('~libs/customs/js/~commons.js') !!}
	<script>
	$(document).ready(function(){
		{!! $dt->init() !!}

		@if($form)
			var form = new DTFORM(
				"#form-{{$dt->id()}}", 
				"{{URL::route('datatable-load-form', ['id' => $dt->id()])}}", 
				'{{$form->model()}}', 
				"{{URL::route('datatable-do-action', ['id' => $dt->id()])}}", 
				eval('{{$dt->name()}}'),
				"{{csrf_token()}}"
			);
		@endif
		/**
		 * REFRESH TE DATATABLE
		 **/
		$('.btn-dt-refresh').on('click', function(event){
			var name = $(this).data('dt-name');
			var t = eval(name);
			t.draw(false);
		});

		var iBlinkApp = new iBlinkCommons({
			datatable : dt,
			token     : '{{csrf_token()}}',
			endpoints : 
				{
					'get-year-semestres' : "{{URL::route('get-year-semestres')}}"
				}
		});
		@yield('datatable-specific-page-jquery-initializations')
	});
	</script>
@stop