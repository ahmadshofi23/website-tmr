@extends('layouts.app')

@section('title', 'Booking Travel')

@section('content')
    <h2>Form Pemesanan Travel</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('booking.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone">No HP</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="pickup">Lokasi Jemput</label>
            <input type="text" id="pickup" name="pickup" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="destination">Tujuan</label>
            <input type="text" id="destination" name="destination" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date">Tanggal Berangkat</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <button class="btn btn-primary">Kirim</button>
        <a href="{{ route('booking.payment', $booking->id) }}" class="btn btn-success">Bayar via QRIS</a>

    </form>
@endsection
