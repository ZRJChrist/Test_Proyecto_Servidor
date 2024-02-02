@props(['type', 'text', 'isoStatus' => 'P'])
@php
    $colorStatus = [
        'P' => 'yellow',
        'R' => 'green',
        'C' => 'red',
    ];
    $type = isset($type) ? $type : $colorStatus[$isoStatus];

    $class = "w-fit bg-$type-100  text-$type-800  text-md font-medium  px-2.5  py-0.5  rounded  dark:bg-$type-900  dark:text-$type-300";
@endphp
<span {!! $attributes->merge(['class' => $class]) !!}>
    {{ $text ?? $slot }}
</span>
