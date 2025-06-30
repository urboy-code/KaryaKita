<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>KaryaKita</title>
</head>

<body class="bg-secondary-light">
    <x-guest-layout>
        <div class="max-w-7xl mx-auto px-6 md:px-8">
            <x-homepage.hero-section />
        </div>
    </x-guest-layout>
    {{-- <div class="min-h-screen">
        <!-- Page Content -->
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <h1 class="font-bold text-3xl text-gray-900 dark:text-white">Jelajahi Jasa Kreatif</h1>
            <p class="text-center text-gray-600 dark:text-gray-400 mt-2">Temukan talenta terbaik di kota Anda.</p>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($services as $service)
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
                @endforeach
            </div>
        </div>
    </div> --}}
</body>

</html>
