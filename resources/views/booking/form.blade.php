@extends('layouts.app')

@section('title', 'Form Booking')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Form Booking Perjalanan Reguler</h2>
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Dari</label>
            <input type="text" name="from" class="form-control" value="{{ $from }}" readonly>
        </div>

        <div class="mb-3">
            <label>Tujuan</label>
            <input type="text" name="to" class="form-control" value="{{ $to }}" readonly>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nomor HP</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Keberangkatan</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jumlah Orang</label>
            <input type="number" name="jumlah_orang" class="form-control" min="1" value="1" id="jumlah_orang" required>
        </div>

        <div class="mb-3">
            <label>Total Harga</label>
            <input type="text" id="total_harga" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-success">Lanjut ke Pembayaran</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jumlahInput = document.getElementById('jumlah_orang');
        const totalInput = document.getElementById('total_harga');

        const hargaPerOrang = {{ $harga ?? 0 }};

        function updateTotal() {
            const jumlah = parseInt(jumlahInput.value) || 0;
            const total = hargaPerOrang * jumlah;
            totalInput.value = 'Rp ' + total.toLocaleString('id-ID');
        }

        jumlahInput.addEventListener('input', updateTotal);
        updateTotal(); // load saat pertama
    });
</script>

@endsection

