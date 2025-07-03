@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'border border-gray-200 dark:bg-white dark:text-gray-950 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-2 focus:ring-primary/50 rounded-md shadow-sm']) }}>
