<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripController extends Controller
{
    public function show($slug)
    {
        $trips = [
            'danau-toba' => [
                'title' => 'Rantau Prapat ke Danau Toba',
                'slug' => 'danau-toba',
                'gambar' => 'lake-toba.jpg',
                'harga' => 'Rp 350.000',
                'deskripsi' => 'Perjalanan santai dan menyenangkan ke Danau Toba dari Rantau Prapat.',
                'rute' => ['Rantau Prapat', 'Siantar', 'Parapat', 'Toba'],
                'destinasi' => ['Pantai Bebas Parapat', 'Taman Simalem', 'Bukit Indah Simarjarunjung']
            ]
        ];

        if (!isset($trips[$slug])) {
            abort(404);
        }

        return view('trip.detail', ['trip' => $trips[$slug]]);
    }
}
