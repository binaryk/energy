<div class="form-group{{$feedback ? ' has-' . $feedback : ''}}">
	<label class="col-md-2 col-lg-2 control-label" style="min-width: 24%;" for="{{$name}}">{{$caption}}</label> 
	<div class="col-sm-4">
	  <label for="file" class="thumbnail text-center">
	    <img src="{{ asset('assets/img/profile.png') }}" alt="" class="target_image">
	    <span class="btn btn-default browse-button image">Încarcă o imagine (.jpg sau .png)</span>
	  </label>
	  @if($help)
	    	<p class="help-block">{{$help}}</p>
	    @endif
	  <input type="hidden" class="image_input" name="image" value="{{ Input::old('image') }}">
	</div>
</div>

<div style="display: none;">
<input id="file" name="image" type="file" class="hook-image-upload" data-target-progress=".browse-button" data-target-image=".target_image" data-target-input=".image_input">
</div> 