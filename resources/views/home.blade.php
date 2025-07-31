@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

{{-- AOS & Custom Styles --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    /* HERO BANNER */
    .hero-banner {
        background: url('/assets/img/tmr-no-background.png') center/cover no-repeat;
        position: relative;
        min-height: 550px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .hero-banner::after {
        content: "";
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: linear-gradient(135deg, rgba(0,0,0,0.8), rgba(0,0,0,0.4));
    }
    .hero-content {
        position: relative;
        z-index: 1;
        color: white;
        text-align: center;
        animation: fadeIn 1.2s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .btn-modern {
        background: linear-gradient(45deg, #ffc107, #ff8c00);
        border: none;
        color: #fff;
        transition: 0.3s;
    }
    .btn-modern:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(255,140,0,0.4);
    }

    /* LAYANAN & CARD MODERN */
    .card-service {
        background: linear-gradient(to bottom right, #ffffff, #f8f9fa);
        border: none;
        border-radius: 1rem;
        backdrop-filter: blur(6px);
        transition: all 0.3s ease-in-out;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    .card-service:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .feature-icon {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        border-radius: 50%;
        margin-bottom: 1rem;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        transition: 0.3s;
    }
    .card-service:hover .feature-icon {
        transform: rotate(10deg) scale(1.1);
    }

    /* KATALOG TRIP */
    .card-trip {
        border: none;
        border-radius: 1rem;
        overflow: hidden;
        transition: transform 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    .card-trip:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.08);
    }
    .card-trip img {
        transition: 0.3s;
    }
    .card-trip:hover img {
        transform: scale(1.05);
    }

    /* GALERI ARMADA */
    .gallery-image {
        transition: 0.3s;
        cursor: pointer;
        border-radius: 0.75rem;
    }
    .gallery-image:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    /* CARD ROUTE MODERN (Glassmorphism + Gradient) */
    .route-card-modern {
        background: linear-gradient(135deg, rgba(255,255,255,0.7), rgba(255,255,255,0.4));
        backdrop-filter: blur(15px);
        border-radius: 1.25rem;
        border: 1px solid rgba(255,255,255,0.2);
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: 0.35s ease;
    }
    .route-card-modern:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.12);
    }

    /* ICON CIRCLE MODERN */
    .route-icon {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg,#ffc107,#ff8c00);
        color: #fff;
        border-radius: 50%;
        box-shadow: 0 8px 20px rgba(255,140,0,0.3);
        transition: 0.35s;
    }
    .route-card-modern:hover .route-icon {
        transform: scale(1.1) rotate(8deg);
    }

    /* BUTTON GRADIENT */
    .btn-gradient {
        background: linear-gradient(45deg,#ffc107,#ff8c00);
        color: #fff;
        border: none;
        transition: 0.3s;
    }
    .btn-gradient:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(255,140,0,0.3);
    }


    /* === Private Trip Modern Card === */
    .trip-card-modern {
        background: linear-gradient(135deg, rgba(255,255,255,0.75), rgba(255,255,255,0.4));
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255,255,255,0.2);
        transition: 0.35s ease-in-out;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }
    .trip-card-modern:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.15);
    }

    /* IMAGE WRAP */
    .trip-image-wrap {
        position: relative;
        overflow: hidden;
    }
    .trip-image {
        transition: transform 0.45s ease;
    }
    .trip-card-modern:hover .trip-image {
        transform: scale(1.08);
    }

    /* OVERLAY GRADIENT */
    .trip-overlay {
        position: absolute;
        top: 0; left: 0; 
        width: 100%; height: 100%;
        background: linear-gradient(to top, rgba(0,0,0,0.5), rgba(0,0,0,0.0));
        opacity: 0;
        transition: 0.35s ease;
    }
    .trip-card-modern:hover .trip-overlay {
        opacity: 1;
    }

    /* BUTTON ON HOVER */
    .trip-overlay .btn {
        transform: translateY(20px);
        opacity: 0;
        transition: 0.35s ease;
    }
    .trip-card-modern:hover .trip-overlay .btn {
        transform: translateY(0);
        opacity: 1;
    }
</style>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show container mt-3" role="alert" data-aos="fade-down">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- HERO SECTION --}}
<div class="hero-banner">
    <div class="hero-content">
        <h1 class="display-3 fw-bold mb-3" data-aos="fade-up">TMR Travel</h1>
        <p class="lead fs-4 mb-4" data-aos="fade-up" data-aos-delay="200">
            Layanan travel Medan – Rantau Prapat terpercaya, cepat & nyaman.
        </p>
        <a href="https://wa.me/6285174317334?text=Halo%20TMR%20Travel%2C%20saya%20ingin%20booking%20travel" 
           class="btn btn-modern btn-lg px-5 py-3 rounded-pill shadow-lg" 
           target="_blank"
           data-aos="zoom-in" data-aos-delay="400">
            <i class="bi bi-whatsapp"></i> Pesan Sekarang
        </a>
    </div>
</div>

<div class="container my-5">
    {{-- LAYANAN --}}
    <h2 class="text-center fw-bold mb-5" data-aos="fade-up">Layanan Kami</h2>
    <div class="row g-4 text-center">
        <div class="col-md-4" data-aos="fade-up">
            <div class="card card-service h-100 p-4">
                <div class="feature-icon bg-primary text-white mx-auto">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <h5 class="card-title">Medan ⇄ Rantau Prapat</h5>
                <p class="card-text">Keberangkatan setiap hari dengan armada nyaman dan sopir berpengalaman.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card card-service h-100 p-4">
                <div class="feature-icon bg-success text-white mx-auto">
                    <i class="bi bi-house-door-fill"></i>
                </div>
                <h5 class="card-title">Door to Door Service</h5>
                <p class="card-text">Kami menjemput dan mengantar langsung ke alamat tujuan Anda.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card card-service h-100 p-4">
                <div class="feature-icon bg-warning text-dark mx-auto">
                    <i class="bi bi-calendar-check-fill"></i>
                </div>
                <h5 class="card-title">Reservasi Mudah</h5>
                <p class="card-text">Booking online via website atau konfirmasi langsung lewat WhatsApp.</p>
            </div>
        </div>
    </div>

    {{-- KATALOG PERJALANAN --}}
    <section class="py-5 position-relative">
        <h2 class="text-center mb-5 fw-bold" data-aos="fade-up">Katalog Perjalanan Reguler</h2>
        <div class="row g-4 justify-content-center">

            @foreach($routes as $route)
                <div class="col-sm-10 col-md-6 col-lg-4" data-aos="zoom-in">
                    <div class="route-card-modern d-flex flex-column align-items-center text-center h-100 p-4">
                        <div class="route-icon mb-3">
                            <i class="bi bi-geo-alt-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-1">{{ $route->from }} → {{ $route->to }}</h5>
                        <p class="mb-3 text-secondary small">
                            Harga mulai <br>
                            <span class="fw-bold text-dark fs-5">Rp {{ number_format($route->price, 0, ',', '.') }}</span>
                        </p>
                        <a href="{{ route('booking.form', ['from' => $route->from, 'to' => $route->to]) }}" 
                        class="btn btn-gradient rounded-pill px-4 py-2 fw-semibold shadow-sm mt-auto">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    {{-- PRIVATE TRIP --}}
    <section class="py-5 position-relative">
        <h2 class="text-center mb-5 fw-bold" data-aos="fade-up">Private Trip</h2>
        <div class="row g-4 justify-content-center">
            @foreach ($trips as $trip)
                <div class="col-sm-10 col-md-6 col-lg-4" data-aos="zoom-in">
                    <div class="trip-card-modern h-100 rounded-4 overflow-hidden d-flex flex-column">
                        
                        {{-- IMAGE WITH OVERLAY --}}
                        <div class="position-relative overflow-hidden trip-image-wrap">
                            <img src="{{ $trip->gambar }}" class="w-100 trip-image" alt="{{ $trip->title }}">
                            <div class="trip-overlay d-flex align-items-center justify-content-center">
                                <a href="{{ route('trip.detail', $trip->slug) }}" 
                                class="btn btn-light fw-bold shadow-sm rounded-pill px-4 py-2">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>

                        {{-- CARD BODY --}}
                        <div class="card-body text-center p-4 flex-grow-1 d-flex flex-column">
                            <h5 class="fw-bold mb-2">{{ $trip->title }}</h5>
                            <p class="text-muted small mb-3 flex-grow-1">{{ Str::limit($trip->deskripsi, 90) }}</p>
                            <p class="fw-bold fs-6 text-primary mb-0">Rp {{ number_format($trip->harga, 0, ',', '.') }}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- TESTIMONI --}}
    <div class="pt-5">
        <h4 class="text-center mb-4" data-aos="fade-up">Testimoni Penumpang</h4>
        <div class="row g-4 text-center">
            <div class="col-md-4" data-aos="flip-left">
                <div class="p-4 bg-light rounded shadow-sm h-100">
                    <p>"Sangat nyaman dan tepat waktu! Sopirnya juga ramah."</p>
                    <small>– Andi, Medan</small>
                </div>
            </div>
            <div class="col-md-4" data-aos="flip-left" data-aos-delay="150">
                <div class="p-4 bg-light rounded shadow-sm h-100">
                    <p>"Pesan via WhatsApp, langsung dijemput depan rumah. Sangat praktis."</p>
                    <small>– Sari, Rantau Prapat</small>
                </div>
            </div>
            <div class="col-md-4" data-aos="flip-left" data-aos-delay="300">
                <div class="p-4 bg-light rounded shadow-sm h-100">
                    <p>"Armada bersih, sopir sopan, dan harga terjangkau. Recommended!"</p>
                    <small>– Budi, Tebing Tinggi</small>
                </div>
            </div>
        </div>
    </div>

    {{-- GALERI ARMADA --}}
    <div class="pt-5">
        <h3 class="text-center fw-bold mb-4" data-aos="fade-up">Galeri Armada Kami</h3>
        <div class="row g-3">
            @foreach ($armadas as $armada)
                <div class="col-sm-6 col-md-3" data-aos="zoom-in">
                    <img src="{{ $armada->image_path }}"
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
                                <img src="{{ $armada->image_path }}" class="img-fluid rounded" alt="Armada TMR Full View">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- AOS Script --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
    });
</script>

@endsection
