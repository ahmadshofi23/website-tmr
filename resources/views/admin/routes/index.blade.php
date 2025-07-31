@extends('layouts.admin')

@section('title', 'Daftar Rute Perjalanan')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-down">
        <h2 class="fw-bold text-white">🧭 Daftar Rute Perjalanan</h2>
        <a href="{{ route('admin.routes.create') }}" class="btn btn-gradient shadow-sm px-4">
            <i class="bi bi-plus-lg"></i> Tambah Rute
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show glass-card border-0 text-white" role="alert" data-aos="fade-down">
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card glass-card shadow-lg border-0" data-aos="fade-up">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-borderless table-hover align-middle mb-0 text-white">
                    <thead class="bg-gradient rounded-top">
                        <tr>
                            <th scope="col">Asal</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Harga</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($routes as $route)
                        <tr class="hover-row" data-aos="fade-up">
                            <td>{{ $route->from }}</td>
                            <td>{{ $route->to }}</td>
                            <td>Rp {{ number_format($route->price, 0, ',', '.') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.routes.edit', $route->id) }}" class="btn btn-sm btn-gradient-success shadow-sm px-3">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                {{-- Tombol Hapus opsional --}}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">Belum ada rute tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- STYLE SELARAS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    body { background: linear-gradient(120deg, #0d1b2a, #1b263b, #0d1b2a); }
    .glass-card { background: rgba(255,255,255,0.07); backdrop-filter: blur(15px); border-radius: 1rem; transition: 0.3s; }
    .glass-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.4); }
    .hover-row:hover { background: rgba(255,255,255,0.08); }
    .bg-gradient { background: linear-gradient(45deg,#0d6efd,#3f87f5); }
    .btn-gradient { background: linear-gradient(45deg, #0d6efd, #3f87f5); color: #fff; border: none; transition: 0.3s; }
    .btn-gradient:hover { transform: scale(1.05); box-shadow: 0 0 15px rgba(13,110,253,0.4); color: #fff; }
    .btn-gradient-success { background: linear-gradient(45deg, #28a745, #20c997); color: #fff; border: none; transition: 0.3s; }
    .btn-gradient-success:hover { transform: scale(1.05); box-shadow: 0 0 15px rgba(40,167,69,0.4); color: #fff; }
</style>
@endsection
