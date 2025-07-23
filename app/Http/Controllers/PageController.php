<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()     { return view('home'); }
    public function about()    { return view('about'); }
    public function services() { return view('services'); }
    public function schedule() { return view('schedule'); }
    public function contact()  { return view('contact'); }
}
