@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        {{-- Gambar Trip --}}
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <img src="{{ $trip->gambar }}" class="card-img-top rounded-top" alt="{{ $trip->title }}">
            </div>
        </div>

        {{-- Detail Trip --}}
        <div class="col-md-5">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h2 class="card-title mb-3">{{ $trip->title }}</h2>

                    <p class="text-muted">{{ $trip->deskripsi }}</p>

                    <hr>

                    <p class="mb-2">
                        <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                        <strong>Rute:</strong> <br>
                        <span class="badge bg-light text-dark mt-1">{{ implode(', ', $trip->rute) }}</span>
                    </p>

                    <p class="mb-2">
                        <i class="bi bi-map-fill text-success me-2"></i>
                        <strong>Destinasi:</strong> <br>
                        @foreach($trip->destinasi as $dest)
                            <span class="badge bg-success me-1 mb-1">{{ $dest }}</span>
                        @endforeach
                    </p>

                    <p class="mb-4">
                        <i class="bi bi-cash-stack text-warning me-2"></i>
                        <strong>Harga:</strong> <br>
                        <span class="fs-5 text-primary fw-bold">Rp {{ number_format($trip->harga, 0, ',', '.') }}</span>
                    </p>

                    {{-- Tambahkan Fasilitas --}}
                    <div class="mb-3">
                        <i class="bi bi-check2-circle text-primary me-2"></i>
                        <strong>Fasilitas:</strong>
                        <ul class="mt-2">
                            <li>Transportasi AC</li>
                            <li>Biaya masuk wisata</li>
                            <li>Makan siang</li>
                            <li>Tour guide berpengalaman</li>
                        </ul>
                    </div>

                    <a href="https://wa.me/6285174317334?text=Halo%20saya%20ingin%20booking%20trip%20{{ urlencode($trip->title) }}" 
                        class="btn btn-success w-100 mt-3" target="_blank">
                        <i class="bi bi-whatsapp me-2"></i> Booking via WhatsApp
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
