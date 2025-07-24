@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">✏️ Edit Rute</h2>

    <form action="{{ route('admin.routes.update', $route->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="from" class="form-label">Asal</label>
            <input type="text" name="from" class="form-control" value="{{ old('from', $route->from) }}" required>
        </div>

        <div class="mb-3">
            <label for="to" class="form-label">Tujuan</label>
            <input type="text" name="to" class="form-control" value="{{ old('to', $route->to) }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $route->price) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('admin.routes.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
