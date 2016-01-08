<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <title>PactulPrimariilor</title>
    <meta name="description" content="">
    <meta name="csrf_token" content="{!! csrf_token() !!}"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <!-- page stylesheets -->
    <!-- end page stylesheets -->
    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="{!! asset('template/styles/webfont.css')!!}">
    <link rel="stylesheet" href="{!! asset('template/styles/climacons-font.css')!!}">
    <link rel="stylesheet" href="{!! asset('template/vendor/bootstrap/dist/css/bootstrap.css')!!}">
    <link rel="stylesheet" href="{!! asset('template/styles/font-awesome.css')!!}">
    <link rel="stylesheet" href="{!! asset('template/styles/card.css')!!}">
    <link rel="stylesheet" href="{!! asset('template/styles/sli.css')!!}">
    <link rel="stylesheet" href="{!! asset('template/styles/animate.css')!!}">
    <link rel="stylesheet" href="{!! asset('template/styles/app.css')!!}">
    <link rel="stylesheet" href="{!! asset('template/styles/app.skins.css')!!}">
    <!-- endbuild -->

    @yield('custom-styles')
    @yield('scripts_grids')
</head>
<body>
@include('includes.partials.messages')
@yield('content')
</body>
<!-- build:js({.tmp,app}) scripts/app.min.js -->
<script src="{!! asset('template/scripts/helpers/modernizr.js')!!}"></script>
<script src="{!! asset('template/vendor/jquery/dist/jquery.js')!!}"></script>
<script src="{!! asset('template/vendor/bootstrap/dist/js/bootstrap.js')!!}"></script>
<script src="{!! asset('template/vendor/fastclick/lib/fastclick.js')!!}"></script>
<script src="{!! asset('template/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js')!!}"></script>
<script src="{!! asset('template/scripts/helpers/smartresize.js')!!}"></script>
<script src="{!! asset('template/scripts/constants.js')!!}"></script>
<script src="{!! asset('template/scripts/main.js')!!}"></script>
<!-- endbuild -->
<!-- initialize page scripts -->
<script src="{!! asset('template/scripts/helpers/sameheight.js')!!}"></script>
<!-- end initialize page scripts -->
<script>
    var token = $('meta[name="csrf_token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token,
            'X-XSRF-TOKEN': token
        },
        '_token' : token,
        async    : false
    });
</script>
@yield('custom-scripts')

</html>
