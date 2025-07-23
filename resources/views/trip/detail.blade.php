@extends('layouts.app')
@section('title', $trip['title'])

@section('content')

<style>
    .circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 16px;
        box-shadow: 0 0 4px rgba(0,0,0,0.1);
    }

    .horizontal-line {
        width: 60px;
        height: 4px;
        background-color: #0d6efd; /* Bootstrap primary color */
        top: 20px;
        z-index: 0;
    }

</style>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('assets/img/wisata/' . $trip['gambar']) }}" alt="{{ $trip['title'] }}" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h2>{{ $trip['title'] }}</h2>
            <p class="text-muted">{{ $trip['harga'] }}</p>
            <p>{{ $trip['deskripsi'] }}</p>
            <a href="{{ route('booking.form', ['paket' => $trip['slug']]) }}" class="btn btn-primary">Pesan Sekarang</a>
        </div>
    </div>

    <div class="mt-5">
        <h4 class="mb-4">🛣️ Rute Perjalanan</h4>
        <div class="d-flex align-items-center overflow-auto px-2 py-4 position-relative">
            @foreach ($trip['rute'] as $index => $rute)
                <div class="text-center position-relative px-3">
                    <div class="circle bg-primary text-white fw-bold d-flex justify-content-center align-items-center mx-auto mb-2">
                        {{ $index + 1 }}
                    </div>
                    <div class="fw-semibold">{{ $rute }}</div>
                    <div class="text-muted small">Rute ke-{{ $index + 1 }}</div>

                    @if (!$loop->last)
                        <div class="horizontal-line position-absolute top-3 start-100 translate-middle-y"></div>
                    @endif
                </div>
            @endforeach
        </div>





        <h4>Destinasi Wisata</h4>
        <ul class="list-group">
            @foreach ($trip['destinasi'] as $destinasi)
                <li class="list-group-item">{{ $destinasi }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
