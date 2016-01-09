<script src="{!! asset('template/vendor/d3/d3.min.js') !!}" ></script>
<script src="{!! asset('template/vendor/c3/c3.min.js') !!}"></script>
<script src="{!! asset('custom/js/monitorizare/Monitorizare.js') !!}"></script>
<script src="{!! asset('custom/js/binaryk/helpers/CallCenter.js') !!}"></script>
<script src="{!! asset('custom/js/binaryk/ui/Modal.js') !!}"></script>
<script>
    @foreach($all as $year => $al)
        var mt_{!! $year !!} = {};
        mt_{!! $year !!} = new App.Monitorizare.Monitorizare({ data: @object($al['months']) });
        mt_{!! $year !!}.drawChart( "{!! $year !!}" );
        mt_{!! $year !!}.handlers( "{!! $year !!}" );
        console.log(mt_{!! $year !!});
    @endforeach


</script>

