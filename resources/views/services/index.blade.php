<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl leading-tight">Jasa Saya</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-gradient-to-br from-secondary-light to-primary-light shadow sm:rounded-lg">
                <div class="mx-auto">
                    <a href="{{ route('talent.services.create') }}"
                        class="px-6 py-3 bg-gray-200 dark:bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-200 uppercase tracking-widest hover:bg-white dark:hover:bg-blue-700 focus:bg-white dark:focus:bg-blue-700 active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">{{ __('+ Tambah Jasa Baru') }}</a>

                    <div class="mt-6 ">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse ($services as $service)
                                <div
                                    class="dark:bg-white/20 backdrop-blur-lg border border-white/50 bg-gray-800 overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out rounded-lg flex flex-col">
                                    <div class="p-6 flex-grow">
                                        <div class="block">
                                            @if ($service->photo)
                                                <img src="{{ asset('storage/' . $service->photo) }}"
                                                    alt="{{ $service->title }}" class="aspect-[16/9] rounded-md">
                                            @else
                                                <img src="https://placehold.co/600x400/png" alt="{{ $service->title }}"
                                                    class="aspect-[16/9] rounded-md">
                                            @endif
                                        </div>
                                        <p class="text-sm mt-2 font-medium text-indigo-400 dark:text-indigo-600">
                                            {{ $service->category->name }}</p>
                                        <h3 class="mt-2 h-14 text-xl font-bold text-white dark:text-gray-900">
                                            {{ $service->title }}</h3>
                                        <p class="mt-2 text-base text-gray-300 dark:text-gray-600 h-24 overflow-hidden">
                                            {{ Str::limit($service->description, 120) }}</p>
                                        <p class="mt-4 text-md font-extrabold text-white dark:text-gray-900">
                                            Rp {{ number_format($service->price, 0, ',', '.') }}</p>

                                        <div
                                            class="mt-6 pt-4 border-t border-gray-700 dark:border-gray-200 flex justify-between items-center gap-3">
                                            <a href="{{ route('talent.services.edit', $service) }}"
                                                class="inline-flex items-center px-6 py-3 bg-gray-200 dark:bg-primary border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-white uppercase tracking-widest hover:bg-primary-light active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ">{{ __('Edit') }}</a>

                                            <form action="{{ route('talent.services.destroy', $service) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <x-danger-button>{{ __('Hapus') }}</x-danger-button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                                    <p class="text-gray-400 dark:text-gray-600 text-lg">Anda belum memiliki jasa untuk
                                        ditawarkan.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
