@extends('layouts.admin')

@section('title', 'Edit Rute')

@section('content')
<div class="container py-5">
    <div class="mb-4" data-aos="fade-down">
        <h2 class="fw-bold text-white">✏️ Edit Rute</h2>
        <p class="text-light mb-0">Ubah data rute perjalanan sesuai kebutuhan.</p>
    </div>

    <div class="card glass-card shadow-lg border-0" data-aos="fade-up">
        <div class="card-body p-4">
            <form action="{{ route('admin.routes.update', $route->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="from" class="form-label text-white">Asal</label>
                    <input type="text" 
                           name="from" 
                           class="form-control bg-transparent text-white border-light @error('from') is-invalid @enderror"
                           value="{{ old('from', $route->from) }}" 
                           placeholder="Contoh: Medan"
                           required>
                    @error('from')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="to" class="form-label text-white">Tujuan</label>
                    <input type="text" 
                           name="to" 
                           class="form-control bg-transparent text-white border-light @error('to') is-invalid @enderror"
                           value="{{ old('to', $route->to) }}" 
                           placeholder="Contoh: Rantau Prapat"
                           required>
                    @error('to')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label text-white">Harga</label>
                    <input type="number" 
                           name="price" 
                           class="form-control bg-transparent text-white border-light @error('price') is-invalid @enderror"
                           value="{{ old('price', $route->price) }}" 
                           placeholder="Contoh: 150000"
                           required>
                    @error('price')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.routes.index') }}" class="btn btn-gradient px-4">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-gradient-success px-4">
                        <i class="bi bi-check2-circle"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- STYLE ELEGAN --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    body { background: linear-gradient(120deg, #0d1b2a, #1b263b, #0d1b2a); }
    .glass-card { background: rgba(255,255,255,0.07); backdrop-filter: blur(15px); border-radius: 1rem; transition: 0.3s; }
    .glass-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.4); }
    .btn-gradient { background: linear-gradient(45deg, #0d6efd, #3f87f5); color: #fff; border: none; transition: 0.3s; }
    .btn-gradient:hover { transform: scale(1.05); box-shadow: 0 0 15px rgba(13,110,253,0.4); color: #fff; }
    .btn-gradient-success { background: linear-gradient(45deg, #28a745, #20c997); color: #fff; border: none; transition: 0.3s; }
    .btn-gradient-success:hover { transform: scale(1.05); box-shadow: 0 0 15px rgba(40,167,69,0.4); color: #fff; }
    input.form-control::placeholder { color: rgba(255,255,255,0.6); }
</style>
@endsection
