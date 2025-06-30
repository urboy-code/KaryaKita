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
                        <form action="{{ route('client.bookings.store') }}" method="POST">
                            @csrf

                            {{-- mengirim id jasa ke form booking --}}
                            <input type="hidden" name="service_id" value="{{ $service->id }}">

                            {{-- Mengirim Tanggal Booking --}}
                            <div class="mb-4">
                                <x-input-label for="booking_date" :value="__('Tanggal Booking')" />
                                <x-text-input id="booking_date" name="booking_date" type="date"
                                    class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('booking_date')" class="mt-2" />
                            </div>

                            {{-- Mengirim Catatan Client --}}
                            <div class="mb-4">
                                <x-input-label for="notes" :value="__('Catatan Tambahan (Opsional)')" />
                                <textarea name="notes" id="notes" rows="1"
                                    class="block mt-1 w-full rounded-md shadow-md  overflow-hidden focus:border-indigo-500">
                                    {{ old('notes', '') }}
                                </textarea>
                            </div>

                            <x-primary-button class="w-full justify-center ">
                                {{ __('Booking Jasa Ini') }}
                            </x-primary-button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
