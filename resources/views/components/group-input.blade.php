@props(['title', 'name', 'type', 'icon', 'value' => null])

@php

    $value = old($name) !== null ? old($name) : $value;
    $title = isset($title) ? $title : ucwords($name);
    $type = isset($type) ? $type : 'text';
    $icon = isset($icon) ? $icon : '';

@endphp
<div {!! $attributes->merge(['class' => 'relative z-0 w-full mb-5 group mt-5']) !!}>
    <x-text-input placeholder="" :id="$name" :type="$type" :name="$name" :value="$value" required />
    <x-input-label for="$name" :icon="$icon" :value="$title" />
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
