@extends('layouts.app')
@section('title', 'Kontak Kami')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Hubungi Kami</h2>
        <p class="text-muted">Kami siap membantu Anda untuk pemesanan, pertanyaan, atau kerja sama.</p>
    </div>

    <div class="row g-5 align-items-start">
        <!-- Kontak Info -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 h-100">
                <h5 class="mb-3"><i class="bi bi-geo-alt-fill me-2 text-primary"></i> Alamat Kantor</h5>
                <p class="text-muted">Jl. Mesjid No.35, Kartini, Rantauprapat, Kec. Rantau Utara, Kab. Labuhanbatu, Sumatera Utara 21411</p>

                <h5 class="mt-4 mb-3"><i class="bi bi-whatsapp me-2 text-success"></i> WhatsApp</h5>
                <p>
                    <a href="https://wa.me/6285174317334" target="_blank" class="text-decoration-none text-success fw-semibold">
                        +62 851-7431-7334
                    </a>
                </p>

                <h5 class="mt-4 mb-3"><i class="bi bi-envelope-fill me-2 text-danger"></i> Email</h5>
                <p class="text-muted">support@tmrtravel.co.id</p>

                <h5 class="mt-4 mb-3"><i class="bi bi-clock-fill me-2 text-warning"></i> Jam Operasional</h5>
                <p class="text-muted">Senin - Minggu: 24 Jam</p>
            </div>
        </div>

        <!-- Google Maps -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="ratio ratio-16x9 rounded">
                        <iframe class="rounded" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.151992843385!2d99.83043467396186!3d2.0947972978864726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302da125f727dddd%3A0x44433dc506b9c00a!2sTMR%20TRAVEL!5e0!3m2!1sid!2sid!4v1753044031437!5m2!1sid!2sid" 
                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
