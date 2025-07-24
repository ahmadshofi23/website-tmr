@extends('layouts.app')

@section('title', 'Booking Berhasil')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <div style="font-size: 60px; color: green;">✅</div>
                        <h2 class="fw-bold">Booking Berhasil</h2>
                        <p class="text-muted">Terima kasih, <strong>{{ $name }}</strong>! Data pemesanan Anda telah kami terima.</p>
                    </div>

                    <div class="text-start mb-4">
                        <h5 class="fw-semibold">Detail Pemesanan:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Nama:</strong> {{ $name }}</li>
                            <li class="list-group-item"><strong>No HP:</strong> {{ $phone }}</li>
                            <li class="list-group-item"><strong>Dari:</strong> {{ $from }} <strong>→</strong> {{ $to }}</li>
                            <li class="list-group-item"><strong>Tanggal:</strong> {{ $date }}</li>
                            <li class="list-group-item"><strong>Jumlah Orang:</strong> {{ $jumlah_orang }}</li>
                            <li class="list-group-item"><strong>Total Harga:</strong> Rp {{ number_format($total_harga, 0, ',', '.') }}</li>
                        </ul>
                    </div>

                    <button onclick="konfirmasiWA()" class="btn btn-success px-4 py-2">
                        📲 Konfirmasi via WhatsApp
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function konfirmasiWA() {
    if (confirm("Apakah Anda yakin ingin konfirmasi ke WhatsApp Admin?")) {
        const url = "https://wa.me/{{ $adminPhone }}?text=" + encodeURIComponent(`Hallo saya telah melakukan booking tiket perjalanan reguler! 🚖
Nama: {{ $name }}
No HP: {{ $phone }}
Dari: {{ $from }} Tujuan: {{ $to }}
Tanggal: {{ $date }}
Jumlah Orang: {{ $jumlah_orang }}
Total Harga: Rp {{ number_format($total_harga, 0, ',', '.') }}`);
        window.open(url, '_blank');
    }
}
</script>
@endsection
