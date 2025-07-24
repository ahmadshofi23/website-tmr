<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteTrip extends Model
{
    protected $fillable = ['from', 'to', 'price'];
}
