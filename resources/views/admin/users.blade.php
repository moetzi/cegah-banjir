@extends('layouts.admin')

@section('content')
<h2>Kelola Pengguna</h2>
<div class="user-management">
    <input type="text" placeholder="Search..." />
    <button>+ Tambah Pengguna</button>
</div>
<table>
    <thead>
        <tr>
            <th>Name</th><th>Email Address</th><th>Role</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr><td>UserA</td><td>usertest1@gmail.com</td><td>Admin</td>
            <td><a href="#">✏️</a> <a href="#">🗑️</a></td></tr>
        <tr><td>UserB</td><td>usertest2@gmail.com</td><td>Viewer</td>
            <td><a href="#">✏️</a> <a href="#">🗑️</a></td></tr>
    </tbody>
</table>
@endsection
