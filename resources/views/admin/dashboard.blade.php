@extends('layouts.admin')

@section('content')
<div class="dashboard">
    <div class="weather-card">
        <h2>Cempaka Putih<br><small>DKI Jakarta</small></h2>
        <p class="temperature">29°C</p>
        <p class="status">sebagian berawan</p>
    </div>

    <div class="info-box blue">
        <strong>Informasi Cara Penanggulangan Banjir</strong>
        <p>Untuk mengetahui cara mengatasi penanggulangan saat datangnya bencana banjir. Lihat informasinya selengkapnya.</p>
    </div>

    <div class="info-box yellow">
        <strong>Status Siaga 2</strong>
        <p>Terdapat peringatan status siaga 2 pada lokasi Johar baru dan pancoran. Lihat Informasi Selengkapnya.</p>
    </div>
</div>
@endsection
