<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Kelola Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-tr from-secondary-light to-primary-light overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium">{{ __('Daftar Booking') }}</h3>

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
                                            Klien
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Talent
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Status
                                        </th>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 text-gray-900">
                                    @forelse ($bookings as $booking)
                                        <tr>
                                            <td class="px-6 py-4">{{ $booking->service->title }}</td>
                                            <td class="px-6 py-4">{{ $booking->client->name ?? 'user deleted' }}</td>
                                            <td class="px-6 py-4">{{ $booking->talent->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{-- Kode badge status yang sama --}}
                                                @php
                                                    $statusClasses = [
                                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                                        'accepted' => 'bg-blue-100 text-blue-800',
                                                        'paid' => 'bg-green-100 text-green-800',
                                                        'rejected' => 'bg-red-100 text-red-800',
                                                        'failed' => 'bg-red-200 text-red-900',
                                                        'completed' => 'bg-purple-100 text-purple-800',
                                                    ];
                                                @endphp
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$booking->status] ?? 'bg-gray-100 text-gray-800' }}">
                                                    {{ ucfirst($booking->status) }}
                                                </span>
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
                        {{ $bookings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
