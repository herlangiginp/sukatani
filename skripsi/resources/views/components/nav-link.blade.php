@props(['active'])

@php
$classes = ($active ?? false)
            ? 'main-menu active'
            : 'main-menu';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
