@props(['isoStatus' => 'P'])

@php
    $colorStatus = [
        'P' => ['class' => 'fa-solid fa-pause text-yellow-500'],
        'R' => ['class' => 'fas fa-check text-green-500'],
        'C' => ['class' => 'fas fa-ban text-red-500'],
    ];
@endphp

<td class="px-6 py-4">
    <div class="flex items-center">
        <div class="me-1">
            <i {{ $attributes->merge(['class' => $colorStatus[$isoStatus]['class']]) }}></i>
        </div> {{ $slot }}
    </div>
</td>
