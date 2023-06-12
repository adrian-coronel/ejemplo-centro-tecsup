@props(['disabled' => false])

{{-- {!! ... !!} => renderizado sin escape --}}
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!}>
