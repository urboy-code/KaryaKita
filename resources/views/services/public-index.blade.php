<x-guest-layout>
    <div class="">
        <div class="max-w-7xl mx-auto py-32 px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-primary">Jelajahi Semua Jasa</h1>
                <p class="mt-2 text-md font-light text-gray-600">Temukan talenta yang tepat untuk proyek Anda
                    berikutnya.</p>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($services as $service)
                    <div
                        class="dark:bg-white bg-gray-800 overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out rounded-lg">
                        <div class="p-6">
                            <p class="text-sm font-medium text-indigo-400 dark:text-indigo-600">
                                {{ $service->category->name }}</p>
                            <h3 class="mt-2 text-xl font-bold text-white dark:text-gray-900">
                                {{ $service->title }}</h3>
                            <p class="mt-2 text-base text-gray-300 dark:text-gray-600 h-24 overflow-hidden">
                                {{ Str::limit($service->description, 120) }}</p>
                            <p class="mt-4 text-md font-extrabold text-white dark:text-gray-900">
                                Rp {{ number_format($service->price, 0, ',', '.') }}</p>

                            <div
                                class="mt-6 pt-4 border-t border-gray-700 dark:border-gray-300 flex justify-between items-center gap-3">
                                <a href="{{ route('services.show', $service) }}"
                                    class="text-sm font-medium bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">{{ __('Detail') }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                        <p>Oops! Belum ada jasa untuk ditawarkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-guest-layout>
