<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::latest()->get();
        return view('admin.trips.index', compact('trips'));
    }

    public function create()
    {
        return view('admin.trips.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'harga' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
            'rute' => 'nullable|string',
            'destinasi' => 'nullable|string',
        ]);

        $trip = new Trip();
        $trip->title = $request->title;
        $trip->slug = Str::slug($request->title);
        $trip->harga = $request->harga;
        $trip->deskripsi = $request->deskripsi;
        $trip->rute = explode(',', $request->rute);
        $trip->destinasi = explode(',', $request->destinasi);

        if ($request->hasFile('gambar')) {
            $trip->gambar = $request->file('gambar')->store('trips', 'public');
        }

        $trip->save();

        return redirect()->route('admin.trips.index')->with('success', 'Trip berhasil ditambahkan!');
    }

    public function edit(Trip $trip)
    {
        return view('admin.trips.edit', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'harga' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
            'rute' => 'nullable|string',
            'destinasi' => 'nullable|string',
        ]);

        $trip->title = $request->title;
        $trip->slug = Str::slug($request->title);
        $trip->harga = $request->harga;
        $trip->deskripsi = $request->deskripsi;
        $trip->rute = explode(',', $request->rute);
        $trip->destinasi = explode(',', $request->destinasi);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($trip->gambar && Storage::disk('public')->exists($trip->gambar)) {
                Storage::disk('public')->delete($trip->gambar);
            }

            // Simpan gambar baru
            $trip->gambar = $request->file('gambar')->store('trips', 'public');
        }

        $trip->save();

        return redirect()->route('admin.trips.index')->with('success', 'Trip berhasil diperbarui!');
    }

    public function destroy(Trip $trip)
    {
        // Hapus gambar dari storage
        if ($trip->gambar && Storage::disk('public')->exists($trip->gambar)) {
            Storage::disk('public')->delete($trip->gambar);
        }

        $trip->delete();
        return redirect()->route('admin.trips.index')->with('success', 'Trip berhasil dihapus.');
    }

    public function show($slug)
    {
        $trip = Trip::where('slug', $slug)->firstOrFail();
        return view('trip.detail', compact('trip'));
    }
}
