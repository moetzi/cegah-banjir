@extends('layouts.admin')

@section('content')
<h2>Status DAS & Ketinggian Air</h2>
<p>Data monitoring DAS akan tampil di sini (simulasi table).</p>

<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Nama DAS</th>
            <th>Ketinggian Air (cm)</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>DAS Kali Jagir</td>
            <td>120</td>
            <td class="text-danger">Siaga 1</td>
        </tr>
        <tr>
            <td>DAS Brantas</td>
            <td>70</td>
            <td class="text-success">Normal</td>
        </tr>
    </tbody>
</table>
@endsection
