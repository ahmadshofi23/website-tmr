<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Route;

class RouteTripController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        return view('admin.routes.index', compact('routes'));
    }

    public function create()
    {
        return view('admin.routes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'from' => 'required|string',
            'to' => 'required|string',
            'price' => 'required|integer',
        ]);

        Route::create($validated);

        return redirect()->route('admin.routes.index')->with('success', 'Rute berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $route = Route::findOrFail($id);
        return view('admin.routes.edit', compact('route'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $route = Route::findOrFail($id);
        $route->update($request->only('from', 'to', 'price'));

        return redirect()->route('admin.routes.index')->with('success', 'Rute berhasil diperbarui!');
    }
}
