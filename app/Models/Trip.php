<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['title', 'slug', 'gambar', 'harga', 'deskripsi', 'rute', 'destinasi'];

    protected $casts = [
        'rute' => 'array',
        'destinasi' => 'array',
    ];
}
