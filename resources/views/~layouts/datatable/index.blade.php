@extends ('~layouts.template.layout')
@section('ngCtrl')
	@parent
	@if($dt->ngCtrl())
	ng-controller = "{!! $dt->ngCtrl() !!}"
	@endif
@stop
@section('content')
@yield('before-table-row')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-solid box-default box-dt" id="box-{!! $dt->id() !!}" >
			@if( $dt->caption() )
				<div class="box-header">
					<div class="row">
						<div class="col-xs-12">
							<h3 class="box-title">{!! $dt->caption() !!}
							<a type="button" class="action-insert-record pull-right btn btn-default btn-outline"> Adaugă </a>
							</h3>
							<div class="title-actions pull-right">@yield('header-actions')</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<!-- toolbar -->
					@if( ! empty($toolbar) )
					<div class="row">
						<div class="col-xs-12">
							<div style="border-top:1px solid #d2d6de; padding-top:1px" class="dt-toolbar-container ">{!! $toolbar!!}</div>
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
				
				<div class="card bg-white dt-form-container" id="form-{!! $dt->id()!!}" style="display: none;"> 
		          <div class="card-header">
					<button class="btn btn-sm btn-close-form box-tools pull-right" data-widget="remove"><i class="fa fa-times"></i></button>
		            <span id="action-title" class="box-title"></span>

		          </div>
		          <div class="card-block">
	          		{!!$form->showForm()!!}
		          </div>
		          <div class="box-footer">
						<div class="row">
							<div class="col-xs-12">
								<button data-action="" class="btn btn-primary btn-do-action">Primary</button> 
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

@section('scripts_grids')
	{!! $dt->styles() !!}
@stop

@section('custom-scripts')
	{!! $dt->scripts() !!}
	<script>
	$(document).ready(function(){
		{!! $dt->init() !!}

		@if($form)
			var form = new DTFORM(
				"#form-{!! $dt->id()!!}",
				"{!! URL::route('datatable-load-form', ['id' => $dt->id()])!!}",
				'{!! $form->model()!!}',
				"{!! URL::route('datatable-do-action', ['id' => $dt->id()])!!}",
				eval('{!! $dt->name()!!}'),
				"{!! csrf_token()!!}",
				"{!! $dt->id()!!}"
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

		@yield('datatable-specific-page-jquery-initializations')
	});
	</script>
@stop