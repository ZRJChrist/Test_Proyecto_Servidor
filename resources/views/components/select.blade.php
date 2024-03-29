@props(['name', 'disabled' => false])
<select name={{ $name ?? 'input-select' }} {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 focus:border-b-blue-700 focus:font-semibold dark:focus:text-blue-700 dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 disabled:border-indigo-300 peer']) }}>
    {{ $slot }}
</select>
