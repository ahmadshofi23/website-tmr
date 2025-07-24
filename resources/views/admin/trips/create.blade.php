@extends('layouts.admin')

@section('title', isset($trip) ? 'Edit Perjalanan' : 'Tambah Perjalanan')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                {{ isset($trip) ? 'Edit Perjalanan' : 'Tambah Perjalanan' }}
            </h4>
        </div>
        <div class="card-body">
            <form method="POST" 
                  action="{{ isset($trip) ? route('admin.trips.update', $trip->id) : route('admin.trips.store') }}" 
                  enctype="multipart/form-data">
                @csrf
                @if(isset($trip))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="title" value="{{ old('title', $trip->title ?? '') }}" 
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $trip->slug ?? '') }}" 
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                    @if(isset($trip) && $trip->gambar)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $trip->gambar) }}" 
                                 class="img-thumbnail" style="max-width: 150px;" alt="Gambar Trip">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ old('harga', $trip->harga ?? '') }}" 
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" 
                              class="form-control" required>{{ old('deskripsi', $trip->deskripsi ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rute (pisahkan dengan koma)</label>
                    <input type="text" name="rute" value="{{ old('rute', isset($trip) ? implode(',', $trip->rute ?? []) : '') }}" 
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Destinasi (pisahkan dengan koma)</label>
                    <input type="text" name="destinasi" value="{{ old('destinasi', isset($trip) ? implode(',', $trip->destinasi ?? []) : '') }}" 
                           class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ isset($trip) ? 'Update' : 'Simpan' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
