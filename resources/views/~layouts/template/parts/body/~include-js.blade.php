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
<!-- page scripts -->
<script src="{!! asset('template/vendor/flot/jquery.flot.js')!!}"></script>
<script src="{!! asset('template/vendor/flot/jquery.flot.resize.js')!!}"></script>
<script src="{!! asset('template/vendor/flot/jquery.flot.categories.js')!!}"></script>
<script src="{!! asset('template/vendor/flot/jquery.flot.stack.js')!!}"></script>
<script src="{!! asset('template/vendor/flot/jquery.flot.time.js')!!}"></script>
<script src="{!! asset('template/vendor/flot/jquery.flot.pie.js')!!}"></script>
<script src="{!! asset('template/vendor/flot-spline/js/jquery.flot.spline.js')!!}"></script>
<script src="{!! asset('template/vendor/flot.orderbars/js/jquery.flot.orderBars.js')!!}"></script>
<!-- end page scripts -->
<!-- initialize page scripts -->
<script src="{!! asset('template/scripts/helpers/sameheight.js')!!}"></script>
<script src="{!! asset('template/scripts/ui/dashboard.js')!!}"></script>
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
