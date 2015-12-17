<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            @if($caption)
                <div class="modal-header">
                    @if($closable)
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    @endif
                    <h4 class="modal-title">{{ $caption }}</h4>
                </div>
            @endif
            @if($body)
                <div class="modal-body">{{ $body }}</div>
            @endif
            @if($footer)
                <div class="modal-footer">{{ $footer }}</div>
            @endif
        </div>
    </div>
</div>