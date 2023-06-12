@props(['selected' => false,'content','value'])
<option
  {{$selected ? 'selected' : ''}} value="{{$value}}">
{{ $slot }}
</option>