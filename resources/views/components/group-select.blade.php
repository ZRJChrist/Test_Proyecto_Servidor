@props(['name', 'title', 'data', 'default' => false, 'value' => null, 'nameOption' => 'name'])
@php
    $title = $title ?? ucwords($name);
@endphp
<div {!! $attributes->merge(['class' => 'relative z-0 w-full mb-5 group']) !!}>
    <x-select :name="$name" required>
        @if ($default == true)
            <option value="null" selected>{{ $title }}</option>
        @endif
        @foreach ($data as $item)
            <option {{ $item->id == (old($name) !== null ? old($name) : $value) ? 'selected' : '' }}
                value="{{ $item->id }}">{{ $item->$nameOption }}
            </option>
        @endforeach
    </x-select>
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
