<x-guest-layout>
    <div class="">
        <div class="max-w-screen-lg mx-auto py-32 px-6 lg:px-8">
            <div class="py-16 text-center">
                <h1 class="text-4xl font-extrabold text-primary">Jelajahi Semua Jasa</h1>
                <p class="mt-2 text-md font-light text-gray-600">Temukan talenta yang tepat untuk proyek Anda
                    berikutnya.</p>
            </div>

            <div class="mt-32 py-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 border-t border-secondary-dark">
                @forelse ($services as $service)
                    <div
                        class="dark:bg-white bg-gray-800 overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out rounded-lg flex flex-col">
                        <div class="p-6">
                            <div class="block">
                                @if ($service->photo)
                                    <img src="{{ asset('storage/' . $service->photo) }}" alt="{{ $service->title }}"
                                        class="aspect-[16/9] rounded-md">
                                @else
                                    <img src="https://placehold.co/600x400/png" alt="{{ $service->title }}"
                                        class="aspect-[16/9] rounded-md">
                                @endif
                            </div>
                            <p class="text-sm font-medium text-indigo-400 dark:text-indigo-600">
                                {{ $service->category->name }}</p>
                            <div class="flex items-center py-4">
                                <img src="{{ asset('storage/' . $service->user->profile->profile_photo) }}"
                                    alt="{{ $service->user->name }}"
                                    class="h-10 w-10 object-cover rounded-full border border-primary shadow-md">
                                <div class="ml-3">
                                    <p class="font-bold text-gray-900">{{ $service->user->name }}</p>
                                </div>
                            </div>
                            <h3 class="mt-2 text-xl font-bold text-white dark:text-gray-900 flex-grow h-16">
                                {{ $service->title }}</h3>
                            <p class="mt-2 text-base text-gray-300 dark:text-gray-600 h-24 overflow-hidden">
                                {{ Str::limit($service->description, 120) }}</p>
                            <p class="mt-4 text-md font-extrabold text-white dark:text-gray-900">
                                Rp {{ number_format($service->price, 0, ',', '.') }}</p>

                            <div class="mt-6 pt-4 border-t border-gray-300 flex justify-center items-center gap-3">
                                <a href="{{ route('services.show', $service) }}"
                                    class="w-1/2 text-center text-sm font-medium bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-full">{{ __('Detail') }}</a>
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
