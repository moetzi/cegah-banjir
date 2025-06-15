@extends('layouts.admin')

@section('content')
<h2>Ketinggian Air</h2>
<div class="chart-placeholder">
    <!-- You can use Chart.js here later -->
    <img src="{{ asset('images/chart-placeholder.png') }}" alt="Ketinggian Air">
</div>

<h2>Notifikasi Darurat</h2>
<div class="alert-box red">
    <strong>!</strong> Tidak ada notifikasi
</div>

<h2>Statistik Evakuasi</h2>
<div class="chart-placeholder">
    <img src="{{ asset('images/chart-evakuasi.png') }}" alt="Statistik Evakuasi">
</div>
@endsection
