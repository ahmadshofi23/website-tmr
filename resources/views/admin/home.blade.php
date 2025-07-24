@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Dashboard Admin</h2>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Kelola Rute Perjalanan Reguler</h5>
                    <p class="card-text">Lihat dan kelola semua rute perjalanan.</p>
                    <a href="{{ route('admin.routes.index') }}" class="btn btn-primary">Lihat Rute</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Kelola Trip</h5>
                    <p class="card-text">Lihat dan kelola semua paket perjalanan.</p>
                    <a href="{{ route('admin.trips.index') }}" class="btn btn-success">Lihat Trips</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <h2 class="mb-4">Daftar Booking</h2>

        {{-- Filter tanggal --}}
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="date" name="date" value="{{ request('date') }}" class="form-control" placeholder="Filter tanggal">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-secondary">🔍 Filter</button>
            </div>
        </form>

        @if($bookings->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Dari</th>
                        <th>Tujuan</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->from }}</td>
                        <td>{{ $booking->to }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->jumlah_orang }}</td>
                        <td>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑 Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada data booking.</p>
        @endif
    </div>


</div>
@endsection
