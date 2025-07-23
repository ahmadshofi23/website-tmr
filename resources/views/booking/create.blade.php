@extends('layouts.app')
@section('title', 'Form Booking')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Form Pemesanan Travel</h2>
    <form method="POST" action="{{ route('booking.store') }}">
        @csrf
        <!-- Input field di sini -->
        <button class="btn btn-success">Kirim</button>
    </form>
</div>
@endsection
