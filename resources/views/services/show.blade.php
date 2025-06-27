<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Kolom kiri: Detail Jasa --}}
            <div class="md:col-span-2 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h1 class="text-3xl font-bold text-gray-600 dark:text-gray-100 mt-2">{{ $service->title }}
                </h1>
                <p class="text-sm font-medium text-gray-400 dark:text-gray-100 mt-2"> {{ $service->category->name }}
                </p>
                <div class="mt-6 text-gray-500 dark:text-gray-300">
                    <p class=""> {{ $service->description }} </p>
                </div>
            </div>
            {{-- Kolom kanan: Info talent & Harga --}}
            <div class="md:col-span-1">
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                    <div class="flex items-center">
                        <img class="w-12 h-12 object-cover rounded-full"
                            src="{{ asset('storage/' . $service->user->profile->profile_photo) }}"
                            alt="{{ $service->user->name }}" />
                        <div class="ml-4">
                            <p class="font-bold text-gray-900 dark:text-white">{{ $service->user->name }}</p>
                            <p class="text-sm text-gray-400 dark:text-gray-100">{{ $service->user->profile->city }}</p>
                        </div>
                    </div>

                    <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-4">
                        <p class="text-md text-gray-600 dark:text-gray-400">Harga mulai dari</p>
                        <p class="text-lg font-extrabold text-gray-900 dark:text-gray-100">Rp
                            {{ number_format($service->price, 0, ',', '.') }}</p>
                    </div>

                    <div class="mt-6">
                        <a href=""
                            class="ext-sm font-medium bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">{{ __('Pesan Jasa Ini') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
