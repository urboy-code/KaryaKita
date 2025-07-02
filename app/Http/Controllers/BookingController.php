<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(StoreBookingRequest $request)
    {
        $validated = $request->validated();

        $service = Service::findOrfail($validated['service_id']);
        $client = $request->user();

        if ($client->role !== 'client') {
            return back()->with('error', 'Hanay Klien yang dapat melakukan booking.');
        }

        if ($service->user_id === $client->id) {
            return back()->with('error', 'Anda tidak dapat melakukan booking pada layanan milik Anda sendiri.');
        }

        $booking = $client->clientBookings()->create([
            'talent_id' => $service->user_id,
            'service_id' => $service->id,
            'booking_date' => $validated['booking_date'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
        ]);

        $booking->save();

        return redirect()->route('home')->with('success', 'Booking berhasil dibuat dan menunggu konfirmasi dari talent.');
    }

    public function pay(Booking $booking)
    {
        // cek pastikan yang bayar adalah client yang benar
        if (Auth::user()->id !== $booking->client_id) {
            abort(403, 'Unauthorized action.');
        }

        // Configurasi midtrans
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // set params
        $params = [
            'transaction_details' => [
                'order_id' => 'KARYAKITA-' . $booking->id . '-' . time(),
                'gross_amount' => $booking->service->price,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'item_details' => [
                [
                    'id' => $booking->service->id,
                    'price' => $booking->service->price,
                    'quantity' => 1,
                    'name' => $booking->service->title,
                ]
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('client.bookings.pay', compact('snapToken', 'booking'));
    }
}
