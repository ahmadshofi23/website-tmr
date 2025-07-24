<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Route;

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
        $route = \App\Models\Route::where('from', $from)->where('to', $to)->first();
        $harga = $route ? $route->price : 0;

        return view('booking.form', compact('from', 'to', 'harga'));
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
            'jumlah_orang' => 'required|integer|min:1',
        ]);

        $route = Route::where('from', $request->from)
                      ->where('to', $request->to)
                      ->first();
        if (!$route) {
            return back()->withErrors(['Route tidak ditemukan.']);
        }
        
        $harga_per_orang = $route->price;
        $total_harga = $harga_per_orang * $request->jumlah_orang;

        // Simpan ke database (contoh pakai model Booking)
       Booking::create([
            'from' => $request->from,
            'to' => $request->to,
            'name' => $request->name,
            'phone' => $request->phone,
            'date' => $request->date,
            'jumlah_orang' => $request->jumlah_orang,
            'total_harga' => $total_harga,
        ]);

        // // Redirect ke halaman sukses atau ke pembayaran
        // $adminPhone = '6285174317334'; // Ganti dengan nomor admin kamu

        // return redirect()->away(
        //     'https://wa.me/' . $adminPhone .
        //     '?text=' . urlencode("Hallo saya telah melakukan booking tiket perjalanan reguler! 🚖\nNama: {$request->name}\nNo HP: {$request->phone}\nDari: {$request->from} Tujuan {$request->to}\nTanggal: {$request->date}\nJumlah Orang: {$request->jumlah_orang}\nTotal Harga: Rp " . number_format($total_harga, 0, ',', '.'))
        // );

        return view('booking.success', [
            'adminPhone' => '6285174317334',
            'name' => $request->name,
            'phone' => $request->phone,
            'from' => $request->from,
            'to' => $request->to,
            'date' => $request->date,
            'jumlah_orang' => $request->jumlah_orang,
            'total_harga' => $total_harga,
        ]);
        // return redirect('/')->with('success', 'Booking berhasil! Kami akan segera menghubungi Anda.');

    }

}
