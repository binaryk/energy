<meta charset="utf-8">
<title>@yield('title','Pactul primariilor')</title>
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
<link rel="stylesheet" href="{!! asset('custom/css/main.css') !!}">
<script>
    var _config = {};
</script>
@yield('custom-styles')
@yield('scripts_grids')