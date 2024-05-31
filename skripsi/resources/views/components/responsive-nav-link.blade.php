@props(['active'])

@php
$classes = ($active ?? false)
            ? 'dark-300 bg-dark-50 dark:bg-dark-900/50 focus:outline-none  focus:bg-dark-100 dark:focus:bg-dark-900 focus:border-dark-700 dark:focus:border-dark-300 transition duration-150 ease-in-out'
            : 'block w-full pr-4 py-2 border-l-4 border-transparent hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none  focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
