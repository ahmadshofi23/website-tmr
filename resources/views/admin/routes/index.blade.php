@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🧭 Daftar Rute Perjalanan</h2>
        <a href="{{ route('admin.routes.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-lg"></i> Tambah Rute
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Asal</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Harga</th>
                        <th scope="col" class="text-end">Aksi</th> {{-- Tambahan --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse($routes as $route)
                        <tr>
                            <td>{{ $route->from }}</td>
                            <td>{{ $route->to }}</td>
                            <td>Rp{{ number_format($route->price, 0, ',', '.') }}</td>
                            <td class="text-end"> {{-- Tambahan --}}
                                <a href="{{ route('admin.routes.edit', $route->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                {{-- (Opsional) tombol hapus nanti bisa ditambahkan juga di sini --}}
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
@endsection
