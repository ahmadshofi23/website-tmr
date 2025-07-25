@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

<style>
    .hero-banner {
        background: radial-gradient(circle at center, rgba(50, 50, 50, 0.7), rgba(30, 30, 30, 0.8), rgba(0, 0, 0, 0.9)),
                url('/assets/img/tmr-no-background.png') no-repeat center center;
        background-size: cover;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease-in-out;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        border-radius: 50%;
        margin-bottom: 1rem;
    }
</style>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show container mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="hero-banner text-white text-center d-flex align-items-center" style="min-height: 500px;">
    <div class="container py-5">
        <h1 class="display-3 fw-bold">TMR Travel</h1>
        <p class="lead fs-4">Layanan travel Medan – Rantau Prapat terpercaya, cepat & nyaman.</p>
        <a href="https://wa.me/6285174317334?text=Halo%20TMR%20Travel%2C%20saya%20ingin%20booking%20travel" 
           class="btn btn-warning btn-lg shadow-lg px-4 py-2 mt-3 rounded-pill" 
           target="_blank">
            <i class="bi bi-whatsapp"></i> Pesan Sekarang
        </a>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center fw-bold mb-5">Layanan Kami</h2>
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="card shadow h-100 border-0 p-4">
                <div class="feature-icon bg-primary text-white mx-auto">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <h5 class="card-title">Medan ⇄ Rantau Prapat</h5>
                <p class="card-text">Keberangkatan setiap hari dengan armada nyaman dan sopir berpengalaman.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow h-100 border-0 p-4">
                <div class="feature-icon bg-success text-white mx-auto">
                    <i class="bi bi-house-door-fill"></i>
                </div>
                <h5 class="card-title">Door to Door Service</h5>
                <p class="card-text">Kami menjemput dan mengantar langsung ke alamat tujuan Anda.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow h-100 border-0 p-4">
                <div class="feature-icon bg-warning text-dark mx-auto">
                    <i class="bi bi-calendar-check-fill"></i>
                </div>
                <h5 class="card-title">Reservasi Mudah</h5>
                <p class="card-text">Booking online via website atau konfirmasi langsung lewat WhatsApp.</p>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center">
        <h4 class="fw-bold mb-4">Kenapa Memilih Kami?</h4>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="p-4 bg-light rounded shadow-sm h-100">
                    <i class="bi bi-car-front-fill display-5 text-info"></i>
                    <h6 class="mt-3">Armada Nyaman</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-light rounded shadow-sm h-100">
                    <i class="bi bi-person-check-fill display-5 text-success"></i>
                    <h6 class="mt-3">Sopir Profesional</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-light rounded shadow-sm h-100">
                    <i class="bi bi-clock-history display-5 text-warning"></i>
                    <h6 class="mt-3">Tepat Waktu</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-light rounded shadow-sm h-100">
                    <i class="bi bi-star-fill display-5 text-danger"></i>
                    <h6 class="mt-3">Ribuan Penumpang Puas</h6>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <h2 class="text-center mb-5">Katalog Perjalanan Reguler</h2>
        <div class="row g-4">
            @php $routes = \App\Models\Route::all(); @endphp
            @foreach($routes as $route)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $route->from }} → {{ $route->to }}</h5>
                            <p class="card-text">Harga: <strong>Rp{{ number_format($route->price, 0, ',', '.') }}</strong></p>
                            <a href="{{ route('booking.form', ['from' => $route->from, 'to' => $route->to]) }}" class="btn btn-primary rounded-pill">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="py-5">
        <h2 class="text-center mb-5">Private Trip</h2>
        <div class="row g-4">
            @php $trips = \App\Models\Trip::all(); @endphp
            @foreach ($trips as $trip)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('storage/' . $trip->gambar) }}" class="card-img-top" alt="{{ $trip->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $trip->title }}</h5>
                            <p class="card-text">{{ Str::limit($trip->deskripsi, 100) }}</p>
                            <p><strong>Harga: Rp {{ number_format($trip->harga, 0, ',', '.') }}</strong></p>
                            <a href="{{ route('trip.detail', $trip->slug) }}" class="btn btn-outline-primary w-100">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div class="pt-5">
        <h4 class="text-center mb-4">Testimoni Penumpang</h4>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-4 bg-light rounded shadow-sm">
                    <p>"Sangat nyaman dan tepat waktu! Sopirnya juga ramah."</p>
                    <small>– Andi, Medan</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-light rounded shadow-sm">
                    <p>"Pesan via WhatsApp, langsung dijemput depan rumah. Sangat praktis."</p>
                    <small>– Sari, Rantau Prapat</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-light rounded shadow-sm">
                    <p>"Armada bersih, sopir sopan, dan harga terjangkau. Recommended!"</p>
                    <small>– Budi, Tebing Tinggi</small>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-5">
        <h3 class="text-center fw-bold mb-4">Galeri Armada Kami</h3>
        <div class="row g-3">
            @php $armadas = \App\Models\Armada::all(); @endphp
            @foreach ($armadas as $armada)
                <div class="col-sm-6 col-md-3">
                    <img src="{{ asset('storage/armada/' . $armada->image_path) }}"
                        class="img-fluid rounded gallery-image shadow-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#modal{{ $loop->index }}"
                        alt="Armada TMR {{ $loop->iteration }}">
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal{{ $loop->index }}" tabindex="-1" aria-labelledby="modalLabel{{ $loop->index }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <img src="{{ asset('storage/armada/' . $armada->image_path) }}" class="img-fluid rounded" alt="Armada TMR Full View">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
