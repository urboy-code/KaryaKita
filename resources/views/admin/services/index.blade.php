<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Kelola Jasa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-tr from-secondary-light to-primary-light overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium">{{ __('Daftar Jasa') }}</h3>

                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <table class="min-w-full divide-y divide-gray-200 mt-6 rounded-md">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Nama Jasa
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Talent
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Kategori
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Harga
                                        </th>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 text-gray-900">
                                    @forelse ($services as $service)
                                        <tr>
                                            <td class="px-6 py-4">{{ $service->title }}</td>
                                            <td class="px-6 py-4">{{ $service->user->name ?? 'user deleted' }}</td>
                                            <td class="px-6 py-4">{{ $service->category->name ?? 'category deleted' }}
                                            </td>
                                            <td class="px-6 py-4">
                                                Rp. {{ number_format($service->price, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-gray-950">
                                                Belum ada jasa.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                    </div>
                    <div class="mt-4">
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
