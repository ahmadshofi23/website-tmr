<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Armada;

class ArmadaController extends Controller
{
    public function index()
    {
        $armadas = Armada::all();
        return view('admin.home', compact('armadas'));
    }

    public function create()
    {
        return view('admin.armadas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/armada'), $filename);

            Armada::create([
                'image_path' => $filename,
            ]);

            return redirect()->back()->with('success', 'Gambar armada berhasil ditambahkan.');
        }

        return redirect()->back()->withErrors('Gambar tidak ditemukan.');
    }


    public function destroy($id)
    {
        $armada = Armada::findOrFail($id);

        // Pastikan ada nama file gambar
        if ($armada->image) {
            $path = public_path('assets/img/armada/' . $armada->image);
            
            // Hapus file jika file tersebut benar-benar ada dan bukan direktori
            if (file_exists($path) && is_file($path)) {
                unlink($path);
            }
        }

        $armada->delete();

        return redirect()->route('admin.home')->with('success', 'Armada berhasil dihapus.');
    }
}
