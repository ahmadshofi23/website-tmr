@extends('layouts.app')

@section('title', 'Layanan Kami - TMR Travel')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Layanan Kami</h2>

    <div class="row text-center">
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Travel Antar Kota</h5>
                    <p class="card-text">Layanan perjalanan dari Medan ke Rantau Prapat dan sebaliknya setiap hari.</p>
                    <a href="https://wa.me/6285174317334?text=Halo%20TMR%20Travel%2C%20saya%20ingin%20booking%20travel" class="btn btn-primary">Booking Sekarang</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Charter / Carter Mobil</h5>
                    <p class="card-text">Sewa mobil harian dengan supir ramah dan profesional.</p>
                    <a href="https://wa.me/6285174317334?text=Halo%20TMR%20Travel%2C%20saya%20ingin%20carter%20mobil" class="btn btn-primary">Booking Sekarang</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Pengantaran Bandara</h5>
                    <p class="card-text">Layanan antar jemput dari/ke Bandara Kualanamu secara nyaman dan tepat waktu.</p>
                    <a href="https://wa.me/6285174317334?text=Halo%20TMR%20Travel%2C%20saya%20ingin%20dijemput%20ke%20bandara" class="btn btn-primary">Booking Sekarang</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm bg-light">
                <div class="card-body">
                    <h5 class="card-title">Pengiriman Paket</h5>
                    <p class="card-text">Kirim paket dokumen atau barang antar kota dengan aman dan cepat.</p>
                    <a href="https://wa.me/6285174317334?text=Halo%20TMR%2C%20saya%20ingin%20kirim%20paket%20antar%20kota" class="btn btn-primary">Kirim Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
