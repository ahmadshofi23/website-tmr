@extends('layouts.app')
@section('title', 'Kontak Kami')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Hubungi Kami</h2>
        <p class="text-muted">Silakan hubungi kami melalui kontak berikut untuk pemesanan, pertanyaan, atau kerja sama.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Alamat Kantor</h5>
                    <p class="card-text">Jl. Jendral Sudirman No. 123, Rantau Prapat, Sumatera Utara</p>

                    <h5 class="card-title mt-4">Telepon / WhatsApp</h5>
                    <p class="card-text">
                        <a href="https://wa.me/6281234567890" target="_blank" class="text-success text-decoration-none">
                            <i class="bi bi-whatsapp"></i> +62 812-3456-7890
                        </a>
                    </p>

                    <h5 class="card-title mt-4">Email</h5>
                    <p class="card-text">support@tmrtravel.co.id</p>

                    <h5 class="card-title mt-4">Jam Operasional</h5>
                    <p class="card-text">Senin - Minggu: 07.00 - 21.00 WIB</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <h4 class="text-center mb-4">Lokasi Kami</h4>
        <div class="ratio ratio-16x9 rounded shadow">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.151992843385!2d99.83043467396186!3d2.0947972978864726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302da125f727dddd%3A0x44433dc506b9c00a!2sTMR%20TRAVEL!5e0!3m2!1sid!2sid!4v1753044031437!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                
            </iframe>
        </div>
    </div>
</div>
@endsection
