@props(['active'])

@php
$classes = ($active ?? true) ? 'npn-active' : 'active';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
