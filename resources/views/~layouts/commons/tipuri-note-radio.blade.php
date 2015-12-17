@foreach($types as $value => $caption)
<label class="radio-inline label-tip-nota">
  <input {{$value=='test' ? 'checked' : ''}} type="radio" class="radio-tip-nota" name="type-nota{{$id}}" id="tip-nota-{{$value}}" value="{{$value}}"> {{$caption}}
</label>
@endforeach