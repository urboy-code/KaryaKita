<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mengambil semua jasa milik user, urutkan dari yang terbaru
        $services = Auth::user()->service()->latest()->get();

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        // dd($request->all());
        // validate form input
        $validated = $request->validated();

        $request->user()->service()->create($validated);

        return redirect()->route('services.index')->with('success', 'Jasa berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $service->load('user.profile', 'category');

        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
        if (Auth::user()->id !== $service->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();

        return view('services.edit', ['service' => $service, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreServiceRequest $request, Service $service)
    {
        //
        if (Auth::user()->id !== $service->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validated();
        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Jasa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
        if (Auth::user()->id !== $service->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Jasa berhasil dihapus.');
    }
}
