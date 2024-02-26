@props(['type' => 'blue'])
@php
    $classColor = [
        'blue' => ' bg-blue-100 text-blue-800 dark:text-blue-400 dark:bg-gray-700 ',
        'gray' => ' bg-gray-100 text-gray-800 dark:text-gray-400 dark:bg-gray-700 ',
        'red' => ' bg-red-100 text-red-800 dark:text-red-400 dark:bg-gray-700 ',
        'green' => ' bg-green-100 text-green-800 dark:text-green-400 dark:bg-gray-700 ',
        'yellow' => ' bg-yellow-100 text-yellow-800 dark:text-yellow-400 dark:bg-gray-700 ',
        'purple' => ' bg-purple-100 text-purple-800 dark:text-purple-400 dark:bg-gray-700 ',
        'cyan' => ' bg-cyan-100 text-cyan-800 dark:text-cyan-400 dark:bg-gray-700 ',
        'pink' => ' bg-pink-100 text-pink-800 dark:text-pink-400 dark:bg-gray-700 ',
    ];
    $class = 'w-fit text-md font-semibold px-2.5  py-0.5 rounded-md mb-2' . $classColor[$type];
@endphp

<span {!! $attributes->merge(['class' => $class]) !!}>
    {{ $slot }}
</span>
