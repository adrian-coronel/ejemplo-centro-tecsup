@props(['disabled' => false])

{{-- {!! ... !!} => renderizado sin escape --}}
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-secondary-subtle rounded']) !!}>
