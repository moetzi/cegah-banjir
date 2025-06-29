@extends('layouts.admin')

@section('content')
<h1 class="mb-4">Dashboard Admin</h1>
<p>Selamat datang di Dashboard CeBan!</p>

<div class="row mt-4 g-4">
    <div class="col-md-4">
        <div class="card shadow p-3">
            <h5>Status DAS</h5>
            <p>Cek kondisi DAS dan status air</p>
            <a href="{{ route('admin.statusDAS') }}" class="btn btn-primary">Lihat Data</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow p-3">
            <h5>Request Evakuasi</h5>
            <p>Kelola laporan warga yang masuk</p>
            <a href="{{ route('admin.evakuasi') }}" class="btn btn-primary">Kelola</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow p-3">
            <h5>Manajemen User</h5>
            <p>Data dan hak akses pengguna</p>
            <a href="{{ route('admin.users') }}" class="btn btn-primary">Kelola</a>
        </div>
    </div>
</div>
@endsection
