<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvakuasiRequest;

class EvakuasiController extends Controller
{
    public function index()
    {
        return view('evakuasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'telepon' => 'required|string',
            'jumlah_orang' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        EvakuasiRequest::create($request->all());

        return redirect()->back()->with('success', 'Permintaan evakuasi berhasil dikirim.');
    }
}
