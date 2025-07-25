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


    <div class="container mt-4">
        <h3 class="mb-3">Galeri Armada</h3>

        {{-- Form Upload --}}
        <form action="{{ route('admin.armadas.store') }}" method="POST" enctype="multipart/form-data" class="mb-3">
            @csrf
            <div class="row g-2 align-items-center">
                <div class="col-md-5">
                    <input type="file" name="image" accept="image/*" class="form-control" onchange="previewImage(event)">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary">📤 Upload Gambar</button>
                </div>
            </div>
            <div class="mt-3">
                <img id="preview" src="#" alt="Preview" class="img-fluid rounded shadow-sm d-none" style="max-height: 250px;">
            </div>
        </form>

        {{-- List Gambar --}}
        <div class="row g-3">

            @forelse ($armadas as $armada)
            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/trip/' . $armada->image_path) }}" class="card-img-top" alt="Armada">

                    <div class="card-body text-center">
                        <form action="{{ route('admin.armadas.destroy', $armada->id) }}" method="POST" onsubmit="return confirm('Hapus gambar ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">🗑 Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-muted">Belum ada gambar armada.</p>
            @endforelse
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

<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        }

        reader.readAsDataURL(file);
    }
}
</script>
@endsection
