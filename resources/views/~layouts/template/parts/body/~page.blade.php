<div class="app layout-fixed-header" @if(count(@$this_url) == 1) style="background-color: #F5F5F5;" @endif>
@if(count(@$this_url) != 1)
	@include('~layouts.template.parts.body.~sidebar')
@endif
	<div class="main-panel" @if(count(@$this_url) == 1) style="margin-right: 12.5rem; background-color: #F5F5F5; margin-top: 5.1rem;" @endif>
      	<!-- top header -->
	    @include('~layouts.template.parts.body.~top-header')
	      <!-- /top header -->
	    <div class="main-content" @if(count(@$this_url) == 1) style="background-color: #F5F5F5;" @endif>
	    @include('~layouts.template.parts.body.~breadcrumbs	')
		@include('includes.partials.messages')
			@yield('content')
		</div>
	</div>
</div>