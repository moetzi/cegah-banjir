@extends('layouts.admin')

@section('content')
<h2>Data Pengguna</h2>
<p>Kelola akun dan hak akses user:</p>

<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Admin CeBan</td>
            <td>admin@ceban.com</td>
            <td>Admin</td>
            <td><button class="btn btn-sm btn-danger">Hapus</button></td>
        </tr>
        <tr>
            <td>Budi</td>
            <td>budi@gmail.com</td>
            <td>Warga</td>
            <td><button class="btn btn-sm btn-danger">Hapus</button></td>
        </tr>
    </tbody>
</table>
@endsection
