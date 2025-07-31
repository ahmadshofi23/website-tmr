@extends('layouts.app')
@section('title', 'Jadwal Keberangkatan')

@section('content')

<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    /* Card Glassmorphism */
    .schedule-card {
        background: linear-gradient(135deg, rgba(255,255,255,0.85), rgba(255,255,255,0.55));
        backdrop-filter: blur(10px);
        border-radius: 1rem;
        border: 1px solid rgba(255,255,255,0.2);
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        transition: all 0.35s ease;
    }
    .schedule-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    }

    /* Modern Table */
    .schedule-table th {
        background: linear-gradient(45deg,#ff8c00,#ffc107);
        color: white;
        font-weight: 600;
    }
    .schedule-table td {
        vertical-align: middle;
    }
    .schedule-table tbody tr:hover {
        background-color: rgba(255, 140, 0, 0.05);
        transition: 0.2s;
    }

    /* CTA Button */
    .btn-gradient {
        background: linear-gradient(45deg,#ffc107,#ff8c00);
        color: white;
        border: none;
        padding: 0.75rem 2.5rem;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    .btn-gradient:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(255,140,0,0.4);
        color: white;
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5" data-aos="fade-down">
        <h2 class="fw-bold">🚌 Jadwal Keberangkatan</h2>
        <p class="text-muted mb-0">Berikut jadwal travel <b>Medan ⇄ Rantau Prapat</b>.  
            <br>Jadwal dapat berubah sesuai kondisi di lapangan.</p>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-lg-8">
            <div class="schedule-card p-4 shadow-sm" data-aos="zoom-in">
                <table class="table schedule-table text-center align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Rute</th>
                            <th>Jam Pagi</th>
                            <th>Jam Sore</th>
                            <th>Jam Malam</th>
                            <th>Durasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold">Medan → Rantau Prapat</td>
                            <td>11:00 WIB</td>
                            <td>14:00 WIB</td>
                            <td>21:00 WIB</td>
                            <td>± 7-8 Jam</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Rantau Prapat → Medan</td>
                            <td>11:00 WIB</td>
                            <td>14:00 WIB</td>
                            <td>21:00 WIB</td>
                            <td>± 7-8 Jam</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center mt-4" data-aos="fade-up">
        <a href="https://wa.me/6285174317334?text=Halo%20TMR%20Travel%2C%20saya%20ingin%20booking%20travel" 
           class="btn btn-gradient btn-lg shadow-lg">
            <i class="bi bi-whatsapp me-1"></i> Booking Sekarang
        </a>
    </div>
</div>

<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
    });
</script>

@endsection
