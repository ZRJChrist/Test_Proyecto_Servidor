@props(['value', 'icon' => null])

<label {{ $attributes->merge(['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}> <i
        class="{{ $icon ?? '' }}"></i> {{ $value ?? $slot }}</label>
