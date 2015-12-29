<!DOCTYPE html> 
<html lang="en" class="no-js" ng-app="app">
@include('~layouts.template.parts.~head') 
<body class="page-header-fixed page-quick-sidebar-over-content" @yield('ngCtrl')>
    @include('includes.partials.messages')
    @include('~layouts.template.parts.body.~spiner')
    @include('~layouts.template.parts.body.~page')  
 	@include('~layouts.template.parts.body.~footer')
    @include('~layouts.template.parts.body.~include-js') 
</body>
</html>

