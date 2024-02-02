@props(['title', 'inf'])

<dd {!! $attributes->merge(['class' => 'text-md font-semibold']) !!}>{{ $title ?? '' }}<span class="font-light">{{ $inf ?? $slot }}</span></dd>
