@extends('layouts.admin')

@section('content')
<h2>Data Request Evakuasi</h2>

<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Nama Pelapor</th>
            <th>Telepon</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Jumlah Korban</th>
            <th>Nama Korban</th>
            <th>Alamat Evakuasi</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if($evakuasi)
            @foreach($evakuasi as $id => $item)
            <tr>
                <td>{{ $item['nama'] ?? '-' }}</td>
                <td>{{ $item['telepon'] ?? '-' }}</td>
                <td>{{ $item['tanggal'] ?? '-' }}</td>
                <td>{{ $item['lokasi'] ?? '-' }}</td>
                <td>{{ $item['jumlah_korban'] ?? ($item['orang'] ?? '-') }}</td>
                <td>{{ $item['nama_korban'] ?? ($item['orang'] ?? '-') }}</td>
                <td>{{ $item['alamat_evakuasi'] ?? '-' }}</td>
                <td>{{ $item['keterangan'] ?? '-' }}</td>
                <td>
                    <span class="badge
                        @if(($item['status'] ?? 'Menunggu') == 'Menunggu') bg-warning text-dark
                        @elseif(($item['status'] ?? 'Menunggu') == 'Sedang Diproses') bg-primary
                        @elseif(($item['status'] ?? 'Menunggu') == 'Selesai') bg-success
                        @else bg-secondary
                        @endif">
                        {{ $item['status'] ?? 'Menunggu' }}
                    </span>
                </td>
                <td>
                    <form action="{{ route('evakuasi.updateStatus', $id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select form-select-sm mb-2">
                            <option value="Menunggu" {{ ($item['status'] ?? 'Menunggu') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="Sedang Diproses" {{ ($item['status'] ?? 'Menunggu') == 'Sedang Diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                            <option value="Selesai" {{ ($item['status'] ?? 'Menunggu') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                    </form>
                </td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10" class="text-center">Belum ada data request evakuasi.</td>
            </tr>
        @endif
    </tbody>
</table>
@endsection
