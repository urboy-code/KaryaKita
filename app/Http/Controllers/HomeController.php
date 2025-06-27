<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $services = Service::with('user', 'category')->latest()->get();
        return view('home', compact('services'));
    }
}
