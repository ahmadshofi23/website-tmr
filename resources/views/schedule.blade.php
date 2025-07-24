@extends('layouts.app')
@section('title', 'Jadwal Keberangkatan')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Jadwal Keberangkatan</h2>
        <p class="text-muted">Berikut jadwal keberangkatan travel Medan ⇄ Rantau Prapat. Jadwal bisa berubah sesuai kondisi.</p>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <table class="table table-bordered shadow-sm">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Rute</th>
                        <th>Jam Pagi</th>
                        <th>Jam Sore</th>
                        <th>Jam Malam</th>
                        <th>Durasi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Medan → Rantau Prapat</td>
                        <td>11:00 WIB</td>
                        <td>14:00 WIB</td>
                        <td>21:00 WIB</td>
                        <td>± 7-8 Jam</td>
                    </tr>
                    <tr>
                        <td>Rantau Prapat → Medan</td>
                        <td>11:00 WIB</td>
                        <td>14:00 WIB</td>
                        <td>21:00 WIB</td>
                        <td>± 7-8 Jam</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        <a href="https://wa.me/6285174317334?text=Halo%20TMR%20Travel%2C%20saya%20ingin%20booking%20travel" class="btn btn-success btn-lg">Booking Sekarang</a>
    </div>
</div>
@endsection
