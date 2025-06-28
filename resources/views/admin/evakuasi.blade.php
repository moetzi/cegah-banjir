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
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if($evakuasi)
            @foreach($evakuasi as $id => $item)
            <tr>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['telepon'] }}</td>
                <td>{{ $item['lokasi'] }}</td>
                <td>{{ $item['orang'] }}</td>
                <td>{{ $item['keterangan'] }}</td>
                <td>
                    <span class="badge
                        @if($item['status'] == 'Belum Diproses') bg-warning text-dark
                        @elseif($item['status'] == 'Sedang Diproses') bg-primary
                        @elseif($item['status'] == 'Selesai') bg-success
                        @else bg-secondary
                        @endif">
                        {{ $item['status'] }}
                    </span>
                </td>
                <td>
                    <form action="{{ route('evakuasi.updateStatus', $id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select form-select-sm mb-2">
                            <option value="Belum Diproses" {{ $item['status'] == 'Belum Diproses' ? 'selected' : '' }}>Belum Diproses</option>
                            <option value="Sedang Diproses" {{ $item['status'] == 'Sedang Diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                            <option value="Selesai" {{ $item['status'] == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                    </form>
                </td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7" class="text-center">Belum ada data request evakuasi.</td>
            </tr>
        @endif
    </tbody>
</table>
@endsection
