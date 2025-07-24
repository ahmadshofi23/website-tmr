@extends('layouts.app')

@section('title', 'Booking Berhasil')

@section('content')
<div class="container py-5">
    <h2 class="mb-3">Booking Berhasil ✅</h2>
    <p>Terima kasih, <strong>{{ $name }}</strong>. Silakan konfirmasi ke WhatsApp admin untuk melanjutkan proses.</p>

    <button onclick="konfirmasiWA()" class="btn btn-success">Konfirmasi via WhatsApp</button>
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
                window.location.href = url;
            }
}
</script>
@endsection
