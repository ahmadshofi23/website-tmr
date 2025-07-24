<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Armada;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $query = Booking::query();
        $armadas = Armada::latest()->get();

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        $bookings = $query->orderBy('date', 'desc')->get();

        return view('admin.home', compact('bookings','armadas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/armada'), $filename);

            Armada::create([
                'image_path' => $filename,
            ]);
        }

        return redirect()->route('admin.home')->with('success', 'Armada berhasil ditambahkan!');
    }


    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.home')->with('success', 'Booking berhasil dihapus.');
    }
}
