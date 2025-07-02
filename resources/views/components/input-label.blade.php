@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-950']) }}>
    {{ $value ?? $slot }}
</label>
