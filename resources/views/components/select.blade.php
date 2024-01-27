@props(['name'])
<select name={{ $name ?? 'input-select' }}
    {{ $attributes->merge(['class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 focus:border-b-blue-700 focus:font-semibold dark:focus:text-white-700 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer']) }}>
    {{ $slot }}
</select>
