@extends('layouts.app')
@section('title', 'Kontak Kami')

@section('content')

<style>
    /* Glass Card Style */
    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        border-radius: 1rem;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        padding: 2rem;
        transition: 0.3s;
    }
    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12);
    }

    /* Icon Style */
    .contact-icon {
        width: 45px;
        height: 45px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 1.3rem;
        margin-right: 0.5rem;
        color: white;
    }
    .icon-map { background: linear-gradient(45deg, #0d6efd, #3f87f5); }
    .icon-wa { background: linear-gradient(45deg, #25D366, #128C7E); }
    .icon-mail { background: linear-gradient(45deg, #ff4d4d, #ff6b6b); }
    .icon-clock { background: linear-gradient(45deg, #ffc107, #ff9800); }

    /* Map Container */
    .map-container {
        position: relative;
        overflow: hidden;
        border-radius: 1rem;
    }
    .map-container iframe {
        transition: 0.3s;
    }
    .map-container:hover iframe {
        transform: scale(1.02);
    }

    /* Skeleton Shimmer Loader */
    .map-skeleton {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        border-radius: 1rem;
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
        z-index: 5;
    }
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    .map-skeleton.hidden {
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.4s ease;
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold mb-2">📞 Hubungi Kami</h2>
        <p class="text-muted">Kami siap membantu untuk pemesanan, pertanyaan, atau kerja sama.</p>
    </div>

    <div class="row g-4 align-items-start">
        <!-- Kontak Info -->
        <div class="col-md-6" data-aos="fade-right">
            <div class="glass-card h-100">
                <div class="mb-4 d-flex align-items-start">
                    <div class="contact-icon icon-map">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Alamat Kantor</h5>
                        <p class="text-muted mb-0 small">
                            Jl. Mesjid No.35, Kartini, Rantauprapat,<br>
                            Kec. Rantau Utara, Kab. Labuhanbatu, Sumatera Utara 21411
                        </p>
                    </div>
                </div>

                <div class="mb-4 d-flex align-items-start">
                    <div class="contact-icon icon-wa">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">WhatsApp</h5>
                        <p class="mb-0 small">
                            <a href="https://wa.me/6285174317334" target="_blank" class="text-decoration-none fw-semibold text-success">
                                +62 851-7431-7334
                            </a>
                        </p>
                    </div>
                </div>

                <div class="mb-4 d-flex align-items-start">
                    <div class="contact-icon icon-mail">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Email</h5>
                        <p class="text-muted small mb-0">support@tmrtravel.co.id</p>
                    </div>
                </div>

                <div class="d-flex align-items-start">
                    <div class="contact-icon icon-clock">
                        <i class="bi bi-clock-fill"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Jam Operasional</h5>
                        <p class="text-muted small mb-0">Senin - Minggu: 24 Jam</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Maps dengan Skeleton Loader -->
        <div class="col-md-6" data-aos="fade-left">
            <div class="map-container shadow-sm ratio ratio-16x9">
                <div class="map-skeleton" id="mapSkeleton"></div>
                <iframe class="rounded" 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.151992843385!2d99.83043467396186!3d2.0947972978864726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302da125f727dddd%3A0x44433dc506b9c00a!2sTMR%20TRAVEL!5e0!3m2!1sid!2sid!4v1753044031437!5m2!1sid!2sid" 
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    onload="document.getElementById('mapSkeleton').classList.add('hidden');">
                </iframe>
            </div>
        </div>
    </div>
</div>

<!-- AOS Animation -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
</script>

@endsection
