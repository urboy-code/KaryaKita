@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-950 dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
