<div class="portlet editbox-remove">
    <div class="rich-editor-body">
         <div class="{{$feedback ? ' has-' . $feedback : ''}}">
					<div class="note-block" data-id="{!! @$attributes['id'] !!}">
						{!! Form::textarea($name, $value, $attributes) !!}
                                <div class="actions"> 
            <a data-id = "{!!$name!!}" title = "Salvează" ng-click="savePost({!!$name!!})" class="pull-right btn btn-save-plan">Salveaza</a> 
        </div>
					</div>
					<div class="comment_box open">
						<div class="comment_id" id="comment-{!! $attributes['id'] !!}" style="display:block">
                            <div class="comment_user"><img id="profile-image" src="{!! auth()->user()->image !!}"></div>
                            {!! Form::textarea('comment', null, array('required', 'class'=>'adauga-comentariu', 'placeholder'=>'Adauga un comentariu...')) !!}
                            <div class="clearfix"></div>
							<a class="pull-right comment_save intro-block-toggle expanded" ng-click="saveCommentBox({!! $attributes['id'] !!})" ><i class="fa fa-commenting-o"></i> Adauga comentariu</a >
						</div>
					</div>
             <div class="clearfix"></div>
					<div class="comment_show">
						<ul class="comment-{!! $attributes['id'] !!}">
							@foreach($comments as $comment)
								<li class="clearfix">
                                    <div class="comment_block">
                                        <div class="comment_user">
                                            <a id="comment_id-{!! $comment['id'] !!}" ng-click="deleteComment({!! $comment['id'] !!})">
                                                <img src="{!! auth()->user()->image !!}">
                                            </a>
                                        </div>
                                        <div class="comment_box_show">{!! $comment->comment !!}</div>
                                    </div>    
                                </li>
							@endforeach
						</ul>
				</div>
				<div class="clearfix"></div>
			@if($help)
				<p class="help-block">{{$help}}</p>
			@endif
	

    </div>
</div> 