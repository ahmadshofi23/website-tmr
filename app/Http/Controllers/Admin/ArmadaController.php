<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Armada;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
            $uploadedFile = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'armada'
            ]);

            Armada::create([
                'image_path' => $uploadedFile->getSecurePath(),
                'cloudinary_public_id' => $uploadedFile->getPublicId(), // simpan id untuk delete
            ]);

            return redirect()->back()->with('success', 'Armada berhasil diunggah ke Cloudinary.');
        }

        return redirect()->back()->withErrors(['image' => 'Gambar tidak ditemukan.']);
    }

    public function destroy($id)
    {
        $armada = Armada::findOrFail($id);

        // Hapus dari Cloudinary jika ada
        if ($armada->cloudinary_public_id) {
            Cloudinary::destroy($armada->cloudinary_public_id);
        }

        $armada->delete();

        return redirect()->route('admin.home')->with('success', 'Armada berhasil dihapus.');
    }

    // public function destroy($id)
    // {
    //     $armada = Armada::findOrFail($id);

    //     // Pastikan ada nama file gambar
    //     if ($armada->image) {
    //         $path = public_path('assets/img/armada/' . $armada->image);
            
    //         // Hapus file jika file tersebut benar-benar ada dan bukan direktori
    //         if (file_exists($path) && is_file($path)) {
    //             unlink($path);
    //         }
    //     }

    //     $armada->delete();

    //     return redirect()->route('admin.home')->with('success', 'Armada berhasil dihapus.');
    // }
}
