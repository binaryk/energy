<div class="app layout-fixed-header">

	@include('~layouts.template.parts.body.~sidebar')

	<div class="main-panel">
      	<!-- top header -->
	    @include('~layouts.template.parts.body.~top-header')
	      <!-- /top header -->
	    <div class="main-content">
	    @include('~layouts.template.parts.body.~breadcrumbs	')
		@include('includes.partials.messages')
			@yield('content')
		</div>
	</div>

</div>