<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Kelola Pesanan Yang Masuk!!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200">
                    <h3 class="text-lg font-medium">{{ __('Daftar Pesanan Masuk') }}</h3>

                    <table class="min-w-full divide-y divide-gray-200 mt-6 rounded-md">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Jasa
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Klien
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Tgl Booking
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="relative px-6 py-3 text-gray-900"><span class="sr-only">Aksi</span></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($bookings as $booking)
                                <tr>
                                    <td class="px-6 py-4 text-gray-400">{{ $booking->service->title }}</td>
                                    <td class="px-6 py-4 text-gray-400">{{ $booking->client->name }}</td>
                                    <td class="px-6 py-4 text-gray-400">
                                        {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                                    <td class="px-6 py-4 text-gray-400">
                                        @php
                                            $statusClasses = [
                                                'pending' => 'bg-yellow-100 text-yellow-800',
                                                'accepted' => 'bg-green-100 text-green-800',
                                                'rejected' => 'bg-red-100 text-red-800',
                                                'completed' => 'bg-blue-100 text-blue-800',
                                            ];
                                        @endphp
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$booking->status] ?? 'bg-gray-100 text-gray-800' }}">{{ ucfirst($booking->status) }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm font-medium flex">
                                        @if ($booking->status == 'pending')
                                            <form action="{{ route('talent.talent.bookings.accept', $booking) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button class="text-green-600 hover:text-green-900">Terima</button>
                                            </form>
                                            <form action="{{ route('talent.talent.bookings.reject', $booking) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')

                                                <button class="ml-4 text-red-600 hover:text-red-900">Tolak</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-100">
                                        Belum ada booking/pesanan yang masuk.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
