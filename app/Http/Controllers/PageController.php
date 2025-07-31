<?php

namespace App\Http\Controllers;
use App\Models\Route;
use App\Models\Trip;
use App\Models\Armada;

class PageController extends Controller
{

    public function index()
    {
        return view('home', [
            'routes'  => Route::all(),
            'trips'   => Trip::all(),
            'armadas' => Armada::all(),
        ]);
    }
    public function about()    { return view('about'); }
    public function services() { return view('services'); }
    public function schedule() { return view('schedule'); }
    public function contact()  { return view('contact'); }
}
