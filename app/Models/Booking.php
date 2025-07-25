<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'from', 'to', 'name', 'phone', 'date', 'jumlah_orang', 'total_harga'
    ];

}

