@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-thin'
            : 'font-light hover:text-blue-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
