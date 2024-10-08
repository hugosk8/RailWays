@props(['active'])

@php
$classes = ($active ?? true) ? '' : '';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
