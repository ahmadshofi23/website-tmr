@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')
<div class="container">
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="{{ asset('assets/img/tmr.jpg') }}" class="img-fluid rounded shadow" alt="Tentang TMR Travel">
        </div>
        <div class="col-md-6">
            <h2 class="mb-3">Tentang TMR Travel</h2>
            <p>
                <strong>TMR (Taxi Medan Rantau Prapat)</strong> adalah penyedia layanan travel darat profesional yang telah beroperasi lebih dari 5 tahun melayani rute <b>Medan ⇄ Rantau Prapat</b> dan sekitarnya.
            </p>
            <p>
                Dengan komitmen pada <strong>kenyamanan, keamanan, dan ketepatan waktu</strong>, kami menghadirkan pengalaman perjalanan yang menyenangkan untuk setiap penumpang. Armada kami selalu dalam kondisi prima dan didukung oleh driver berpengalaman serta ramah.
            </p>
            <p>
                Nikmati layanan <strong>door-to-door</strong> tanpa repot — kami jemput dan antar Anda langsung ke lokasi tujuan, menjadikan perjalanan lebih praktis dan efisien.
            </p>
            <p>
                💡 <strong>Mengapa pilih TMR?</strong><br>
                • Armada bersih dan terawat<br>
                • Driver ramah & profesional<br>
                • Booking mudah via WhatsApp<br>
                • Jadwal keberangkatan setiap hari<br>
                • Harga terjangkau & transparan
            </p>
            <p>
                <strong>Visi kami</strong> adalah menjadi <em>solusi transportasi darat terpercaya</em> di seluruh wilayah <b>Sumatera Utara</b>, dengan terus meningkatkan kualitas layanan untuk kenyamanan Anda.
            </p>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-4">
            <div class="p-4 border rounded shadow-sm">
                <h4>5+ Tahun</h4>
                <p>Pengalaman melayani rute Medan – Rantau</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 border rounded shadow-sm">
                <h4>1000+</h4>
                <p>Penumpang setiap bulan</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 border rounded shadow-sm">
                <h4>24 Jam</h4>
                <p>Layanan Customer Support via WhatsApp</p>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <!-- Tambahan konten lainnya bisa di sini -->
    </div>
</div>
@endsection
