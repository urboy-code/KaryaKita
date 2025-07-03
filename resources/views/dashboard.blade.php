<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white md:bg-gradient-to-br from-secondary-light to-primary-light overflow-hidden shadow-sm sm:rounded-lg py-6">
                <div class="p-6 text-gray-900">
                    <div class="py-12">
                        <h2 class="text-3xl font-extrabold text-center text-gray-900 ">Selamat datang kembali,
                            {{ $user->name }}
                        </h2>
                        <p class="mt-2 text-center text-xl font-light text-gray-500">
                            {{ __('Kelola jasa Anda di sini 😊') }}
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-base font-semibold text-gray-500">{{ __('Jasa Aktif') }}</h3>
                                    <p class="mt-2 text-4xl font-extrabold text-primary tracking-tight">
                                        {{ $data['total_services'] }}</p>
                                </div>
                                <div class="bg-primary/10 p-3 rounded-full text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-8">
                                        <path fill-rule="evenodd"
                                            d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25Zm7.5 0v.09a49.488 49.488 0 0 0-6 0v-.09a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5Zm-3 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
                                    </svg>

                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-base font-semibold text-gray-500">{{ __('Booking Pending') }}</h3>
                                    <p class="mt-2 text-4xl font-extrabold text-primary tracking-tight">
                                        {{ $data['pending_bookings'] }}</p>
                                </div>
                                <div class="bg-primary/10 p-3 rounded-full text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-8">
                                        <path
                                            d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z" />
                                        <path fill-rule="evenodd"
                                            d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('talent.services.index') }}"
                            class="bg-primary-light text-white md:bg-white/20 backdrop-blur-lg p-6 rounded-xl shadow-lg border border-white/50 font-bold flex items-center justify-center text-lg transition-colors sm:rounded-lg">{{ __('Kelola Jasa') }}</a>
                        <a href="{{ route('talent.talent.bookings.index') }}"
                            class="bg-primary-light text-white md:bg-white/20 backdrop-blur-xl p-6 rounded-xl shadow-lg border border-white/50 font-bold flex items-center justify-center text-lg transition-colors sm:rounded-lg">{{ __('Kelola Booking') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
