<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-blue-200 dark:bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-200 uppercase tracking-widest hover:bg-white dark:hover:bg-blue-700 focus:bg-white dark:focus:bg-blue-700 active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
