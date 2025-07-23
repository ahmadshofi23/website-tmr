@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

<style>
    .hero-banner {
        background: radial-gradient(circle at center, rgba(50, 50, 50, 0.7), rgba(30, 30, 30, 0.8), rgba(0, 0, 0, 0.9)),
                url('/assets/img/tmr-no-background.png') no-repeat center center;
        background-size: fill;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease-in-out;
    }

    .wave {
        position: absolute;
        bottom: -1px;
        width: 100%;
        height: 100px;
    }
</style>

<!-- Carousel -->
<!-- <div id="tmrCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach (['banner1.jpg', 'banner2.jpg', 'banner3.jpg'] as $img)
        <div class="carousel-item @if($loop->first) active @endif">
            <img src="{{ asset('assets/img/banner/' . $img) }}" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="Slide {{ $loop->iteration }}">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="fw-bold">TMR Travel</h5>
                <p>Layanan Travel Medan ⇄ Rantau Prapat Terpercaya</p>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#tmrCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Sebelumnya</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#tmrCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Berikutnya</span>
    </button>
</div> -->

<div class="hero-banner text-white p-5 mb-5 text-center">
    <div class="container py-5">
        <h1 class="display-4 fw-bold">TMR Travel</h1>
        <p class="lead">Layanan travel Medan – Rantau Prapat terpercaya, cepat & nyaman.</p>
        <a href="https://wa.me/6285174317334?text=Halo%20TMR%20Travel%2C%20saya%20ingin%20booking%20travel" 
           class="btn btn-warning btn-lg mt-3 shadow" 
           target="_blank">
            <i class="bi bi-whatsapp"></i> Pesan Sekarang
        </a>
    </div>
    <!-- <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,160L60,176C120,192,240,224,360,240C480,256,600,256,720,240C840,224,960,192,1080,181.3C1200,171,1320,181,1380,186.7L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg> -->
</div>

<div class="container">
    <h2 class="text-center fw-bold mb-5">Layanan Kami</h2>
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0 p-4">
                <i class="bi bi-geo-alt-fill display-4 text-primary mb-3"></i>
                <h5 class="card-title">Medan ⇄ Rantau Prapat</h5>
                <p class="card-text">Keberangkatan setiap hari dengan armada nyaman dan sopir berpengalaman.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0 p-4">
                <i class="bi bi-house-door-fill display-4 text-success mb-3"></i>
                <h5 class="card-title">Door to Door Service</h5>
                <p class="card-text">Kami menjemput dan mengantar langsung ke alamat tujuan Anda.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0 p-4">
                <i class="bi bi-calendar-check-fill display-4 text-warning mb-3"></i>
                <h5 class="card-title">Reservasi Mudah</h5>
                <p class="card-text">Booking online via website atau konfirmasi langsung lewat WhatsApp.</p>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center">
        <h4 class="fw-bold mb-4">Kenapa Memilih Kami?</h4>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="p-4 bg-light rounded shadow-sm">
                    <i class="bi bi-car-front-fill display-5 text-info"></i>
                    <h6 class="mt-3">Armada Nyaman</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-light rounded shadow-sm">
                    <i class="bi bi-person-check-fill display-5 text-success"></i>
                    <h6 class="mt-3">Sopir Profesional</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-light rounded shadow-sm">
                    <i class="bi bi-clock-history display-5 text-warning"></i>
                    <h6 class="mt-3">Tepat Waktu</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-light rounded shadow-sm">
                    <i class="bi bi-star-fill display-5 text-danger"></i>
                    <h6 class="mt-3">Ribuan Penumpang Puas</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Katalog Perjalanan -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Katalog Perjalanan</h2>

            <div class="row justify-content-center">
                @php
                    $routes = [
                        ['from' => 'Rantau Prapat', 'to' => 'Medan', 'price' => 'Rp150.000'],
                        ['from' => 'Medan', 'to' => 'Rantau Prapat', 'price' => 'Rp150.000'],
                        ['from' => 'Medan', 'to' => 'Kisaran', 'price' => 'Rp100.000'],
                    ];
                @endphp

                @foreach($routes as $route)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $route['from'] }} → {{ $route['to'] }}</h5>
                                <p class="card-text">Harga: <strong>{{ $route['price'] }}</strong></p>
                                <a href="{{ route('booking.form', ['from' => $route['from'], 'to' => $route['to']]) }}" class="btn btn-primary">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Paket Wisata</h2>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm mb-4">
                        <img src="{{ asset('assets/img/wisata/lake-toba.jpg') }}" class="card-img-top" alt="Danau Toba">
                        <div class="card-body">
                            <h5 class="card-title">Rantau Prapat → Danau Toba</h5>
                            <p class="card-text">
                                Nikmati keindahan Danau Toba dengan paket wisata full day dari Rantau Prapat. Sudah termasuk transportasi & dan biaya masuk wisata.
                            </p>
                            <p><strong>Harga: Rp 350.000 / orang</strong></p>
                            <a href="{{ route('trip.detail', 'danau-toba') }}" class="btn btn-outline-primary w-100">Lihat Detail</a>

                        </div>
                    </div>
                </div>

                {{-- Tambah paket lain di bawah sini jika ada --}}
                {{-- ... --}}

            </div>
        </div>
    </section>



    <div class="mt-5 pt-5">
        <h4 class="text-center mb-4">Testimoni Penumpang</h4>
        <div class="row text-center">
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

    <div class="mt-5 pt-5 border-top">
        <h3 class="text-center fw-bold mb-4">Galeri Armada Kami</h3>
        <div class="row g-3">
            @foreach (['armada1.jpg', 'armada2.jpg', 'armada3.jpg', 'armada4.jpg'] as $img)
                <div class="col-sm-6 col-md-3">
                    <img src="{{ asset('assets/img/armada/' . $img) }}" 
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
                                <img src="{{ asset('assets/img/armada/' . $img) }}" class="img-fluid rounded" alt="Armada TMR Full View">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
