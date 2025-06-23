@extends('layouts.admin')

@section('content')
<h2>Data Request Evakuasi</h2>
<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Nama Pelapor</th>
            <th>Telepon</th>
            <th>Lokasi</th>
            <th>Orang Dievakuasi</th>
            <th>Keterangan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @if($evakuasi)
            @foreach($evakuasi as $item)
            <tr>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['telepon'] }}</td>
                <td>{{ $item['lokasi'] }}</td>
                <td>{{ $item['orang'] }}</td>
                <td>{{ $item['keterangan'] }}</td>
                <td><span class="badge bg-warning text-dark">{{ $item['status'] }}</span></td>
            </tr>
            @endforeach
        @else
            <tr><td colspan="6" class="text-center">Belum ada data request evakuasi.</td></tr>
        @endif
    </tbody>
</table>
@endsection
