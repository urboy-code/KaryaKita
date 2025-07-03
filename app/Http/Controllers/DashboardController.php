<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $data = [];

        $data['total_services'] = $user->service()->count();
        $data['pending_bookings'] = $user->talentBookings()->where('status', ['pending', 'accepted'])->count();


        return view('dashboard', compact('data', 'user'));
    }
}
