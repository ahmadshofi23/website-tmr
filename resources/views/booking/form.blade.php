@extends('layouts.app')

@section('title', 'Form Booking')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Form Booking Perjalanan</h2>
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

        <button type="submit" class="btn btn-success">Lanjut ke Pembayaran</button>
    </form>
</div>
@endsection
