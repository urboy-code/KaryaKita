<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Konfirmasi Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium">{{ __('Detail pesanan') }}</h3>
                    <p class="mt-2">Jasa: {{ $booking->service->title }}</p>
                    <p>Talent: {{ $booking->talent->name }}</p>
                    <p class="text-xl font-bold mt-4">Total: Rp
                        {{ number_format($booking->service->price, 0, ',', '.') }}</p>
                    <div class="mt-6">
                        <button id="pay-button"
                            class="inline-flex items-center px-6 py-3 bg-primary hover:bg-primary-dark text-white font-semibold rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition ease-in-out duration-150">Lanjutkan
                            Pembayaran</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    <script tyoe="text/javascript">
        var payButton = document.getElementById('pay-button');

        payButton.addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    alert("Pembayaran sukses!");
                    console.log(result);
                    window.location.href = '{{ route('client.bookings.index') }}';
                },
                // Optional
                onPending: function(result) {
                    /* Biasanya untuk pembayaran yg butuh waktu, misal transfer bank */
                    alert("Menunggu pembayaran Anda!");
                    console.log(result);
                },
                // Optional
                onError: function(result) {
                    /* Jika terjadi error */
                    alert("Pembayaran gagal!");
                    console.log(result);
                },
                onClose: function() {
                    /* Jika pembayaran dibatalkan */
                    alert("Pembayaran dibatalkan!");
                }
            })
        })
    </script>
</x-guest-layout>
