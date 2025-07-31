@extends('layouts.app')

@section('title', 'Layanan Kami - TMR Travel')

@section('content')

{{-- CSS Modern Langsung --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    .service-card {
        background: linear-gradient(135deg, rgba(255,255,255,0.8), rgba(255,255,255,0.5));
        backdrop-filter: blur(10px);
        border-radius: 1rem;
        padding: 2rem 1.5rem;
        text-align: center;
        transition: all 0.35s ease;
        border: 1px solid rgba(255,255,255,0.2);
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }
    .service-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .service-icon {
        width: 70px;
        height: 70px;
        margin-bottom: 1rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #fff;
        background: linear-gradient(45deg,#ff8c00,#ffc107);
        box-shadow: 0 5px 15px rgba(255,140,0,0.3);
        transition: transform 0.3s;
    }
    .service-card:hover .service-icon {
        transform: scale(1.1) rotate(5deg);
    }
    .btn-modern {
        background: linear-gradient(45deg,#ffc107,#ff8c00);
        color: #fff;
        border: none;
        transition: 0.3s;
    }
    .btn-modern:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(255,140,0,0.3);
        color: #fff;
    }
</style>

<div class="container py-5">
    <h2 class="text-center fw-bold mb-5" data-aos="fade-down">💼 Layanan Kami</h2>

    <div class="row g-4 justify-content-center">

        <div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-delay="0">
            <div class="service-card h-100">
                <div class="service-icon bg-warning">
                    <i class="bi bi-truck"></i>
                </div>
                <h5 class="fw-bold mb-2">Travel Antar Kota</h5>
                <p class="text-muted mb-3 small">Perjalanan Medan ⇄ Rantau Prapat setiap hari dengan armada nyaman.</p>
                <a href="https://wa.me/6285174317334?text=Halo%20TMR%20Travel%2C%20saya%20ingin%20booking%20travel" class="btn btn-modern btn-sm rounded-pill px-4">Booking</a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="service-card h-100">
                <div class="service-icon bg-success">
                    <i class="bi bi-car-front"></i>
                </div>
                <h5 class="fw-bold mb-2">Charter Mobil</h5>
                <p class="text-muted mb-3 small">Sewa mobil harian dengan sopir ramah dan profesional.</p>
                <a href="https://wa.me/6285174317334?text=Halo%20TMR%20Travel%2C%20saya%20ingin%20carter%20mobil" class="btn btn-modern btn-sm rounded-pill px-4">Booking</a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-card h-100">
                <div class="service-icon bg-primary">
                    <i class="bi bi-airplane"></i>
                </div>
                <h5 class="fw-bold mb-2">Pengantaran Bandara</h5>
                <p class="text-muted mb-3 small">Antar jemput Bandara Kualanamu dengan nyaman dan tepat waktu.</p>
                <a href="https://wa.me/6285174317334?text=Halo%20TMR%20Travel%2C%20saya%20ingin%20dijemput%20ke%20bandara" class="btn btn-modern btn-sm rounded-pill px-4">Booking</a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="service-card h-100">
                <div class="service-icon bg-danger">
                    <i class="bi bi-box-seam"></i>
                </div>
                <h5 class="fw-bold mb-2">Pengiriman Paket</h5>
                <p class="text-muted mb-3 small">Kirim dokumen atau barang antar kota dengan cepat dan aman.</p>
                <a href="https://wa.me/6285174317334?text=Halo%20TMR%2C%20saya%20ingin%20kirim%20paket%20antar%20kota" class="btn btn-modern btn-sm rounded-pill px-4">Kirim</a>
            </div>
        </div>

    </div>
</div>

{{-- AOS JS --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
    });
</script>

@endsection
