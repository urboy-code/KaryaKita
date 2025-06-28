<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Service;
use Illuminate\Http\Request;

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
}
