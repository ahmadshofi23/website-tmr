@extends('layouts.app')

@section('content')

{{-- === CSS Modern & Thumbnail === --}}
<style>
    .trip-carousel img {
        border-radius: 1rem;
        object-fit: cover;
        height: 400px;
    }
    .trip-thumbnails {
        margin-top: 1rem;
        display: flex;
        gap: 0.5rem;
        overflow-x: auto;
        scrollbar-width: none;
    }
    .trip-thumbnails::-webkit-scrollbar {
        display: none;
    }
    .trip-thumbnails img {
        height: 70px;
        width: 100px;
        object-fit: cover;
        border-radius: 0.5rem;
        cursor: pointer;
        opacity: 0.7;
        transition: 0.3s;
    }
    .trip-thumbnails img.active,
    .trip-thumbnails img:hover {
        opacity: 1;
        transform: scale(1.05);
        box-shadow: 0 0 8px rgba(0,0,0,0.3);
    }

    .badge-custom {
        font-size: 0.85rem;
        padding: 0.4em 0.7em;
        border-radius: 50rem;
    }

    .btn-whatsapp {
        background: linear-gradient(45deg, #25D366, #128C7E);
        color: white;
        border: none;
        transition: 0.3s;
    }
    .btn-whatsapp:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 25px rgba(37, 211, 102, 0.4);
        color: white;
    }

    .text-gradient {
        background: linear-gradient(45deg, #ff8c00, #ffc107);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>

<div class="container py-5">
    <div class="row g-4 align-items-start">
        {{-- Carousel Gambar Trip --}}
        <div class="col-lg-7" data-aos="fade-right">
            <div id="tripCarousel" class="carousel slide trip-carousel shadow-sm" data-bs-ride="carousel">
                <div class="carousel-inner rounded-4">
                    @php
                        $gambarArray = is_array($trip->gambar) ? $trip->gambar : [$trip->gambar];
                    @endphp

                    @foreach($gambarArray as $index => $gambar)
                        <div class="carousel-item @if($index === 0) active @endif">
                            <img src="{{ $gambar }}" class="d-block w-100" alt="{{ $trip->title }}">
                        </div>
                    @endforeach
                </div>

                @if(count($gambarArray) > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#tripCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#tripCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                @endif
            </div>

            {{-- Thumbnail Slider --}}
            @if(count($gambarArray) > 1)
                <div class="trip-thumbnails mt-2">
                    @foreach($gambarArray as $index => $gambar)
                        <img src="{{ $gambar }}" 
                             class="@if($index===0) active @endif"
                             data-bs-target="#tripCarousel" 
                             data-bs-slide-to="{{ $index }}">
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Detail Trip --}}
        <div class="col-lg-5" data-aos="fade-left">
            <div class="card shadow-lg border-0 rounded-4 h-100">
                <div class="card-body p-4">
                    <h2 class="fw-bold mb-3 text-gradient">{{ $trip->title }}</h2>

                    <p class="text-muted mb-4">{{ $trip->deskripsi }}</p>

                    <div class="mb-3">
                        <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                        <strong>Rute:</strong> <br>
                        <span class="badge bg-light text-dark mt-2 badge-custom">{{ implode(', ', $trip->rute) }}</span>
                    </div>

                    <div class="mb-3">
                        <i class="bi bi-map-fill text-success me-2"></i>
                        <strong>Destinasi:</strong> <br>
                        @foreach($trip->destinasi as $dest)
                            <span class="badge bg-success bg-opacity-75 text-white me-1 mb-1 badge-custom">{{ $dest }}</span>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <i class="bi bi-cash-stack text-warning me-2"></i>
                        <strong>Harga:</strong> <br>
                        <span class="fs-4 text-primary fw-bold">Rp {{ number_format($trip->harga, 0, ',', '.') }}</span>
                    </div>

                    <div class="mb-4">
                        <i class="bi bi-check2-circle text-primary me-2"></i>
                        <strong>Fasilitas:</strong>
                        <ul class="mt-2 text-muted small">
                            <li>🚐 Transportasi AC</li>
                            <li>🎫 Biaya masuk wisata</li>
                            <li>🍽️ Makan siang</li>
                            <li>🧭 Tour guide berpengalaman</li>
                        </ul>
                    </div>

                    <a href="https://wa.me/6285174317334?text=Halo%20saya%20ingin%20booking%20trip%20{{ urlencode($trip->title) }}" 
                        class="btn btn-whatsapp w-100 py-2 fw-semibold rounded-pill" target="_blank">
                        <i class="bi bi-whatsapp me-2"></i> Booking via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- === Script AOS & Thumbnail Active Sync === --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });

    // Sync thumbnail active state
    const carousel = document.querySelector('#tripCarousel');
    const thumbnails = document.querySelectorAll('.trip-thumbnails img');

    if(carousel && thumbnails.length){
        carousel.addEventListener('slide.bs.carousel', function (event) {
            thumbnails.forEach(img => img.classList.remove('active'));
            thumbnails[event.to].classList.add('active');
        });
    }
</script>

@endsection
