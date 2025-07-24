<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $query = Booking::query();

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        $bookings = $query->orderBy('date', 'desc')->get();

        return view('admin.home', compact('bookings'));
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.home')->with('success', 'Booking berhasil dihapus.');
    }
}
