@props(['icon' => '', 'type' => 'blue'])
@php
    $iconList = [
        'pause' => 'fa-solid fa-pause',
        'check' => 'fas fa-check',
        'ban' => 'fas fa-ban',
    ];
    $classIcon = array_key_exists($icon, $iconList) ? $iconList[$icon] : $icon;
@endphp

<div {!! $attributes->merge(['class' => 'py-4']) !!}>
    <x-badges :type="$type" class="flex text-center">
        <div class="mr-1">
            <i class="{{ $classIcon }}"></i>
        </div>
        {{ $slot }}
    </x-badges>
</div>
