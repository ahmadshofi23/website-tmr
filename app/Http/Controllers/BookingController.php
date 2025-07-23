<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        return view('booking.form');
    }

    public function form(Request $request)
    {
        $from = $request->query('from');
        $to = $request->query('to');

        return view('booking.form', compact('from', 'to'));
    }


    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'from' => 'required|string',
            'to' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|string',
            'date' => 'required|date',
        ]);

        // Simpan ke database (contoh pakai model Booking)
        Booking::create($validated);

        // Redirect ke halaman sukses atau ke pembayaran
        return redirect()->route('home')->with('success', 'Booking berhasil disimpan!');
    }

}
