@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-white mb-0" data-aos="fade-down">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard Admin
        </h2>
        <span class="badge bg-gradient px-3 py-2 fs-6 shadow-sm">✨ Elegant Mode</span>
    </div>

    {{-- STATISTIK --}}
    <div class="row g-4 mb-5">
        <div class="col-lg-8" data-aos="fade-right">
            <div class="card glass-card shadow-lg border-0 p-3 h-100">
                <h5 class="fw-bold text-white mb-3">
                    <i class="bi bi-bar-chart-line-fill me-2"></i> Statistik Booking Bulanan
                </h5>
                <canvas id="bookingChart" height="120"></canvas>
            </div>
        </div>
        <div class="col-lg-4" data-aos="fade-left">
            <div class="card glass-card shadow-lg border-0 p-3 h-100 text-center">
                <h5 class="fw-bold text-white mb-3">
                    <i class="bi bi-pie-chart-fill me-2"></i> Trip Aktif & Armada
                </h5>
                <canvas id="tripChart" height="200"></canvas>
            </div>
        </div>
    </div>

    {{-- CARD AKSI --}}
    <div class="row g-4 mb-5">
        <div class="col-md-6" data-aos="zoom-in">
            <div class="card shadow-lg border-0 glass-card h-100 action-card">
                <div class="card-body text-center p-4">
                    <i class="bi bi-geo-alt-fill display-4 text-gradient mb-3"></i>
                    <h5 class="card-title fw-bold text-white">Kelola Rute Perjalanan</h5>
                    <p class="card-text text-white">
                        Tambahkan, perbarui, dan hapus <strong>rute perjalanan</strong> agar pelanggan dapat memilih
                        rute yang tepat untuk perjalanan mereka. Atur <em>asal</em>, <em>tujuan</em>, dan <em>harga tiket</em>
                        dengan mudah.
                    </p>
                    <a href="{{ route('admin.routes.index') }}" class="btn btn-gradient px-4 mt-2">
                        📍 Lihat & Kelola Rute
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6" data-aos="zoom-in">
            <div class="card shadow-lg border-0 glass-card h-100 action-card">
                <div class="card-body text-center p-4">
                    <i class="bi bi-luggage-fill display-4 text-gradient-success mb-3"></i>
                    <h5 class="card-title fw-bold text-white">Kelola Trip / Paket Wisata</h5>
                    <p class="card-text text-white">
                        Buat dan kelola <strong>trip atau paket wisata</strong> lengkap dengan deskripsi, harga,
                        destinasi, dan gambar promosi agar pelanggan tertarik untuk memesan perjalanan.
                    </p>
                    <a href="{{ route('admin.trips.index') }}" class="btn btn-gradient-success px-4 mt-2">
                        🧳 Lihat & Kelola Trips
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- GALERI ARMADA --}}
    <div class="mt-5" data-aos="fade-up">
        <h3 class="fw-bold text-white mb-3"><i class="bi bi-images me-2"></i>Galeri Armada</h3>

        {{-- Form Upload --}}
        <form action="{{ route('admin.armadas.store') }}" method="POST" enctype="multipart/form-data"
              class="mb-4 glass-card p-4 shadow-sm border-0 text-center">
            @csrf
            <div class="row g-2 align-items-center justify-content-center">
                <div class="col-md-5">
                    <input type="file" name="image" accept="image/*"
                           class="form-control form-control-lg" onchange="previewImage(event)">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-gradient px-4">📤 Upload Gambar</button>
                </div>
            </div>
            <div class="mt-3 text-center">
                <img id="preview" src="#" alt="Preview"
                     class="img-fluid rounded shadow d-none mt-3" style="max-height: 250px;">
            </div>
        </form>

        {{-- List Gambar --}}
        <div class="row g-4 justify-content-start">
            @forelse ($armadas as $armada)
                <div class="col-6 col-md-3" data-aos="zoom-in">
                    <div class="card shadow-sm border-0 glass-card h-100 armada-card overflow-hidden">
                        <img src="{{ $armada->image_path }}"
                             class="card-img-top rounded-top hover-zoom" alt="Armada">
                        <div class="card-body text-center p-2">
                            <form action="{{ route('admin.armadas.destroy', $armada->id) }}"
                                  method="POST" onsubmit="return confirm('Hapus gambar ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger w-100 mt-2">🗑 Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-light">Belum ada gambar armada.</p>
            @endforelse
        </div>
    </div>

    {{-- TABEL BOOKING --}}
    <div class="mt-5" data-aos="fade-up">
        <h3 class="fw-bold text-white mb-3"><i class="bi bi-journal-text me-2"></i>Daftar Booking</h3>

        {{-- Filter --}}
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="date" name="date" value="{{ request('date') }}"
                       class="form-control form-control-lg">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-gradient px-4">🔍 Filter</button>
            </div>
        </form>

        @if($bookings->count())
            <div class="table-responsive glass-card p-2 shadow-lg border-0">
                <table class="table table-hover align-middle mb-0 table-borderless">
                    <thead class="bg-gradient text-white">
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
                    <tbody class="text-light">
                        @foreach($bookings as $booking)
                        <tr class="hover-row">
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->phone }}</td>
                            <td>{{ $booking->from }}</td>
                            <td>{{ $booking->to }}</td>
                            <td>{{ $booking->date }}</td>
                            <td>{{ $booking->jumlah_orang }}</td>
                            <td>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('admin.bookings.destroy', $booking->id) }}"
                                      method="POST" onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">🗑 Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-light">Tidak ada data booking.</p>
        @endif
    </div>

</div>

{{-- SCRIPT CHART --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@php
    $chartData = $bookingChartData ?? [12, 19, 3, 5, 2, 3, 9, 14, 10, 12, 8, 6];
@endphp
<script>
    const bookingData = @json($chartData);
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

    new Chart(document.getElementById('bookingChart'), {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Booking per Bulan',
                data: bookingData,
                fill: true,
                backgroundColor: 'rgba(13,110,253,0.2)',
                borderColor: '#0d6efd',
                tension: 0.4,
                pointBackgroundColor: '#0d6efd'
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    new Chart(document.getElementById('tripChart'), {
        type: 'doughnut',
        data: {
            labels: ['Trip Aktif', 'Armada'],
            datasets: [{
                data: [{{ $totalTrips ?? 10 }}, {{ $totalArmadas ?? 5 }}],
                backgroundColor: ['#20c997', '#0d6efd'],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { labels: { color: '#fff' } } }
        }
    });

    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        }
    }
</script>

{{-- STYLE ELEGAN --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    body { background: linear-gradient(120deg, #0d1b2a, #1b263b, #0d1b2a); }
    .glass-card { background: rgba(255,255,255,0.07); backdrop-filter: blur(15px); border-radius: 1rem; transition: 0.3s; }
    .glass-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.4); }
    .action-card:hover i { transform: rotate(-5deg) scale(1.1); transition: 0.4s; }
    .hover-row:hover { background: rgba(255,255,255,0.08); }
    .bg-gradient { background: linear-gradient(45deg,#0d6efd,#3f87f5); }
    .text-gradient { background: linear-gradient(45deg,#0d6efd,#3f87f5); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .text-gradient-success { background: linear-gradient(45deg,#28a745,#20c997); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .btn-gradient { background: linear-gradient(45deg, #0d6efd, #3f87f5); color: #fff; border: none; transition: 0.3s; }
    .btn-gradient:hover { transform: scale(1.05); box-shadow: 0 0 15px rgba(13,110,253,0.4); color: #fff; }
    .btn-gradient-success { background: linear-gradient(45deg, #28a745, #20c997); color: #fff; border: none; transition: 0.3s; }
    .btn-gradient-success:hover { transform: scale(1.05); box-shadow: 0 0 15px rgba(40,167,69,0.4); color: #fff; }
    .hover-zoom { transition: transform 0.3s ease; }
    .hover-zoom:hover { transform: scale(1.1); }
</style>
@endsection
