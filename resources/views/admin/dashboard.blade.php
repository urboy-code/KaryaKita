<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white md:bg-gradient-to-br from-secondary-light to-primary-light overflow-hidden shadow-sm sm:rounded-lg py-6">
                <div class="p-6 text-gray-900">
                    <div class="py-12">
                        <h2 class="text-3xl font-extrabold text-center text-gray-900 ">Selamat datang kembali, Admin
                        </h2>
                        <p class="mt-2 text-center text-xl font-light text-gray-500">
                            {{ __('Kelola platform Anda di sini 😊') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
