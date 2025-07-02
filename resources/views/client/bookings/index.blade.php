<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">{{ __('Riwayat Booking Saya') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium">Semua Transaksi Saya</h3>

                    <div class="mt-6 overflow-x-auto">
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
                                    <th class="relative px-6 py-3 text-gray-900 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-gray-900">
                                @forelse ($bookings as $booking)
                                    <tr>
                                        <td class="px-6 py-4">{{ $booking->service->title }}</td>
                                        <td class="px-6 py-4">{{ $booking->talent->name }}</td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                                        <td class="px-6 py-4">
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
                                        <td class="px-6 py-4">
                                            @if ($booking->status == 'accepted')
                                                <a href="#"
                                                    class="inline-block bg-primary text-white font-bold py-1 px-3 rounded-full text-xs">
                                                    Bayar Sekarang</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-950">
                                            Anda belum memiliki riwayat booking.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
