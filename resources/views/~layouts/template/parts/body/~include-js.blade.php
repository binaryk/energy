<script src="{!! asset('template/scripts/helpers/modernizr.js')!!}"></script>
<script src="{!! asset('template/vendor/jquery/dist/jquery.js')!!}"></script>
<script src="{!! asset('template/vendor/bootstrap/dist/js/bootstrap.js')!!}"></script>
<script src="{!! asset('template/vendor/fastclick/lib/fastclick.js')!!}"></script>
<script src="{!! asset('template/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js')!!}"></script>
<script src="{!! asset('template/scripts/helpers/smartresize.js')!!}"></script>
<script src="{!! asset('template/scripts/constants.js')!!}"></script>
<script src="{!! asset('template/scripts/main.js')!!}"></script>

<script src="{!! asset('custom/js/utils/math.js')!!}"></script>

<script src="{!! asset('components/angular/angular.min.js') !!}"></script>
<script src="{!! asset('custom/js/angular/~config.js') !!}"></script>
<!-- end page scripts -->
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
