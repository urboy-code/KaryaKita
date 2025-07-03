<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // mengambil semua jasa milik user, urutkan dari yang terbaru
        $user = Auth::user();
        $services = Service::with(['user.profile', 'category'])->latest()->get();


        return view('services.public-index', compact('services'));
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

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('service_photos', 'public');
            $validated['photo'] = $path;
        }

        $request->user()->service()->create($validated);

        return redirect()->route('talent.services.index')->with('success', 'Jasa berhasil dibuat.');
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
    public function update(UpdateServiceRequest $request, Service $service)
    {
        // 1. Otorisasi (jika pake Policy)
        if (Auth::user()->id !== $service->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // 2. Ambil semua data yang sudah lolos validasi
        $validated = $request->validated();
        // dd('langkah1', $validated);

        // 3. Update photo jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada (opsional)
            if ($service->photo) {
                Storage::disk('public')->delete($service->photo);
            }

            // Simpen filenya DAN TANGKAP alamat barunya ke variabel $path
            $path = $request->file('photo')->store('service_photos', 'public');
            // dd('langkah 3', $path);

            // Gunain variabel $path itu untuk di-update ke database
            $validated['photo'] = $path;
        }

        // 4. Update service dengan semua data yang sudah disiapkan
        $service->update($validated);

        return redirect()->route('talent.services.index')->with('status', 'Jasa berhasil diperbarui!');
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

        return redirect()->route('talent.services.index')->with('success', 'Jasa berhasil dihapus.');
    }
}
