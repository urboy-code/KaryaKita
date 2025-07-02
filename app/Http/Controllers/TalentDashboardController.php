<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TalentDashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        if ($user->role !== 'talent') {
            abort(403, 'Hanya talent yang dapat mengakses dashboard ini.');
        }

        $bookings = $user->talentBookings()->with(['client', 'service'])->latest()->get();

        return view('talent.bookings.index', compact('bookings'));
    }

    public function servicesIndex()
    {
        $talent = Auth::user();
        $services = $talent->service()->with('category')->latest()->get();

        return view('services.index', compact('services'));
    }

    public function accept(Booking $booking)
    {
        if (Auth::user()->id !== $booking->talent_id) {
            abort(403, 'Anda tidak memiliki izin untuk mengubah status booking ini.');
        }
        $booking->update(['status' => 'accepted']);
        return redirect()->route('talent.talent.bookings.index')->with('status', 'Booking berhasil diterima!');
    }

    public function reject(Booking $booking)
    {
        if (Auth::user()->id !== $booking->talent_id) {
            abort(403, 'Anda tidak memiliki izin untuk mengubah status booking ini.');
        }
        $booking->update(['status' => 'rejected']);
        return redirect()->route('talent.talent.bookings.index')->with('status', 'Booking telah ditolak!');
    }
}
