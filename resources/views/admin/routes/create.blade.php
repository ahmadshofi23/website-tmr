@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Rute Baru</h2>

    <form action="{{ route('admin.routes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="from" class="form-label">Asal</label>
            <input type="text" class="form-control @error('from') is-invalid @enderror" name="from" id="from" value="{{ old('from') }}" required>
            @error('from')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="to" class="form-label">Tujuan</label>
            <input type="text" class="form-control @error('to') is-invalid @enderror" name="to" id="to" value="{{ old('to') }}" required>
            @error('to')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price') }}" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.routes.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
