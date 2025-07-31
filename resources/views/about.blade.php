@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')

{{-- AOS CSS langsung disini --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    /* === HERO PARALLAX === */
    .hero-about {
        min-height: 350px;
        background: url('{{ asset('assets/img/tmr-banner.jpg') }}') center/cover no-repeat fixed;
        position: relative;
    }
    .hero-overlay {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: linear-gradient(135deg, rgba(0,0,0,0.7), rgba(0,0,0,0.3));
        z-index: 1;
    }
    .z-2 { z-index: 2; }

    /* TEXT GRADIENT */
    .text-gradient {
        background: linear-gradient(45deg, #ff8c00, #ffc107);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* STAT CARD */
    .stat-card {
        background: linear-gradient(135deg, #ffffff, #f9f9f9);
        transition: all 0.35s ease;
        border: 1px solid rgba(0,0,0,0.05);
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.08);
    }
    .stat-icon {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #fff;
        border-radius: 50%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>

{{-- HERO PARALLAX --}}
<section class="hero-about position-relative d-flex align-items-center justify-content-center text-center text-white">
    <div class="hero-overlay"></div>
    <div class="container position-relative z-2" data-aos="fade-up">
        <h1 class="display-4 fw-bold mb-3">Tentang <span class="text-warning">TMR Travel</span></h1>
        <p class="lead mb-0">Travel Medan – Rantau Prapat Terpercaya, Nyaman, dan Tepat Waktu</p>
    </div>
</section>

<div class="container py-5">

    {{-- ABOUT CONTENT --}}
    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">
            <img src="{{ asset('assets/img/tmr.jpg') }}" class="img-fluid rounded-4 shadow-lg" alt="Tentang TMR Travel">
        </div>
        <div class="col-md-6" data-aos="fade-left">
            <h2 class="fw-bold mb-3 text-gradient">Mengapa Memilih <span class="text-warning">TMR Travel</span>?</h2>
            <p class="lead text-muted">
                <strong>TMR (Taxi Medan Rantau Prapat)</strong> telah beroperasi lebih dari 5 tahun 
                melayani rute <b>Medan ⇄ Rantau Prapat</b> dengan mengutamakan 
                <strong>kenyamanan, keamanan, dan ketepatan waktu</strong>.
            </p>
            <ul class="list-unstyled mt-3 text-muted">
                <li>✅ Armada bersih & terawat</li>
                <li>✅ Driver ramah & profesional</li>
                <li>✅ Booking mudah via WhatsApp</li>
                <li>✅ Keberangkatan setiap hari</li>
                <li>✅ Harga transparan & terjangkau</li>
            </ul>
            <p class="mt-3 text-muted">
                <strong>Visi:</strong> Menjadi <em>solusi transportasi darat terpercaya</em> 
                di seluruh Sumatera Utara.
            </p>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="row text-center g-4 mb-5">
        <div class="col-md-4" data-aos="zoom-in">
            <div class="stat-card p-4 rounded-4 shadow-sm h-100">
                <div class="stat-icon bg-warning mb-3 mx-auto">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <h4 class="fw-bold text-dark">5+ Tahun</h4>
                <p class="text-muted mb-0">Pengalaman melayani rute Medan – Rantau</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="stat-card p-4 rounded-4 shadow-sm h-100">
                <div class="stat-icon bg-success mb-3 mx-auto">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h4 class="fw-bold text-dark">1000+</h4>
                <p class="text-muted mb-0">Penumpang setiap bulan</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="stat-card p-4 rounded-4 shadow-sm h-100">
                <div class="stat-icon bg-primary mb-3 mx-auto">
                    <i class="bi bi-whatsapp"></i>
                </div>
                <h4 class="fw-bold text-dark">24 Jam</h4>
                <p class="text-muted mb-0">Customer Support via WhatsApp</p>
            </div>
        </div>
    </div>

</div>

{{-- AOS Script --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
</script>

@endsection
