<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // ambil semua jasa, eager load relasi, urutkan, dan paginasi
    public function index()
    {
        $services = Service::with(['user', 'category'])->latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }
}
