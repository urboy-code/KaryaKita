<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white leading-tight">{{ __('Edit Jasa') }}</h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="">
                    <form action="{{ route('service.update', $service) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <x-service-form :categories="$categories" :service="$service" />

                        <div class="mt-4">
                            <x-primary-button>
                                {{ __('Simpan Jasa') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
