<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientDashboardController extends Controller
{
    //
    public function index(){
        $client = Auth::user();

        // Mengambil data booking milik client
        $bookings = $client->clientBookings()
        ->with(['talent.profile', 'service.category'])
        ->latest()
        ->get();

        return view('client.bookings.index', compact('bookings'));

    }
}
