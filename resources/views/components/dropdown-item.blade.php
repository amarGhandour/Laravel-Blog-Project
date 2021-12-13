@props(['active' => false])

@php
    $classes = 'block text-left px-3 text-sm leading-loose hover:bg-blue-500  focus-within:outline-none';

    if ($active) $classes .= ' bg-blue-500 text-white'
@endphp

<a {{$attributes(['class' => $classes])}}>
    {{$slot}}
</a>
