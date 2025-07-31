@extends('layouts.admin')

@section('title', isset($trip) ? 'Edit Perjalanan' : 'Tambah Perjalanan')

@section('content')
<div class="container py-5">
    <div class="mb-4" data-aos="fade-down">
        <h2 class="fw-bold text-white">
            {{ isset($trip) ? '✏️ Edit Perjalanan' : '🧳 Tambah Perjalanan Baru' }}
        </h2>
        <p class="text-light mb-0">
            {{ isset($trip) ? 'Ubah informasi perjalanan sesuai kebutuhan.' : 'Isi data perjalanan baru yang akan ditambahkan.' }}
        </p>
    </div>

    <div class="card glass-card shadow-lg border-0" data-aos="fade-up">
        <div class="card-body p-4">
            <form method="POST" 
                  action="{{ isset($trip) ? route('admin.trips.update', $trip->id) : route('admin.trips.store') }}" 
                  enctype="multipart/form-data">
                @csrf
                @if(isset($trip))
                    @method('PUT')
                @endif

                {{-- JUDUL --}}
                <div class="mb-3">
                    <label class="form-label text-white">Judul</label>
                    <input type="text" name="title" 
                           value="{{ old('title', $trip->title ?? '') }}" 
                           class="form-control bg-transparent text-white border-light @error('title') is-invalid @enderror" 
                           placeholder="Contoh: Liburan Danau Toba" required>
                    @error('title')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- SLUG --}}
                <div class="mb-3">
                    <label class="form-label text-white">Slug</label>
                    <input type="text" name="slug" 
                           value="{{ old('slug', $trip->slug ?? '') }}" 
                           class="form-control bg-transparent text-white border-light @error('slug') is-invalid @enderror" 
                           placeholder="contoh-liburan-danau-toba" required>
                    @error('slug')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- GAMBAR --}}
                <div class="mb-3">
                    <label class="form-label text-white">Gambar</label>
                    <input type="file" name="gambar" 
                           class="form-control bg-transparent text-white border-light">
                    @if(isset($trip) && $trip->gambar)
                        <div class="mt-3">
                            <img src="{{ $trip->gambar }}" class="img-thumbnail shadow-sm hover-zoom" style="max-width: 180px;" alt="Gambar Trip">
                        </div>
                    @endif
                </div>

                {{-- HARGA --}}
                <div class="mb-3">
                    <label class="form-label text-white">Harga (Rp)</label>
                    <input type="number" name="harga" 
                           value="{{ old('harga', $trip->harga ?? '') }}" 
                           class="form-control bg-transparent text-white border-light @error('harga') is-invalid @enderror" 
                           placeholder="Contoh: 1500000" required>
                    @error('harga')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DESKRIPSI --}}
                <div class="mb-3">
                    <label class="form-label text-white">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" 
                              class="form-control bg-transparent text-white border-light @error('deskripsi') is-invalid @enderror" 
                              placeholder="Tuliskan deskripsi perjalanan..." required>{{ old('deskripsi', $trip->deskripsi ?? '') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- RUTE --}}
                <div class="mb-3">
                    <label class="form-label text-white">Rute (pisahkan dengan koma)</label>
                    <input type="text" name="rute" 
                           value="{{ old('rute', isset($trip) ? implode(',', $trip->rute ?? []) : '') }}" 
                           class="form-control bg-transparent text-white border-light @error('rute') is-invalid @enderror" 
                           placeholder="Medan,Berastagi,Danau Toba" required>
                    @error('rute')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DESTINASI --}}
                <div class="mb-3">
                    <label class="form-label text-white">Destinasi (pisahkan dengan koma)</label>
                    <input type="text" name="destinasi" 
                           value="{{ old('destinasi', isset($trip) ? implode(',', $trip->destinasi ?? []) : '') }}" 
                           class="form-control bg-transparent text-white border-light @error('destinasi') is-invalid @enderror" 
                           placeholder="Pulau Samosir,Bukit Holbung" required>
                    @error('destinasi')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.trips.index') }}" class="btn btn-gradient px-4">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-gradient-success px-4">
                        <i class="bi bi-check2-circle"></i> {{ isset($trip) ? 'Update' : 'Simpan' }}
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
    input.form-control::placeholder, textarea.form-control::placeholder { color: rgba(255,255,255,0.6); }
    .hover-zoom { transition: transform 0.3s ease; }
    .hover-zoom:hover { transform: scale(1.05); }
</style>
@endsection
