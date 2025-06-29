<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EvakuasiController extends Controller
{
    protected $databaseUrl;

    public function __construct()
    {
        $this->databaseUrl = env('FIREBASE_DATABASE_URL');
    }

    // Menampilkan form request evakuasi
    public function form()
    {
        return view('request-evakuasi');
    }

    // Mengirim request evakuasi ke Firebase
    public function submit(Request $request)
    {
        $request->validate([
            'nama'       => 'required',
            'telepon'    => 'required',
            'lokasi'     => 'required',
            'orang'      => 'required',
            'keterangan' => 'required'
        ]);

        $data = [
            'nama'       => $request->nama,
            'telepon'    => $request->telepon,
            'lokasi'     => $request->lokasi,
            'orang'      => $request->orang,
            'keterangan' => $request->keterangan,
            'status'     => 'Menunggu',
            'created_at' => now()->toDateTimeString()
        ];

        Http::post($this->databaseUrl . '/evakuasi.json', $data);

        return redirect('/request-evakuasi')->with('success', 'Request evakuasi berhasil dikirim.');
    }

    // Menampilkan data request evakuasi di admin
    public function adminEvakuasi()
    {
        $response = Http::get($this->databaseUrl . '/evakuasi.json');
        $evakuasi = $response->json();

        return view('admin.evakuasi', compact('evakuasi'));
    }

    // Mengubah status request evakuasi
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $data = [
            'status' => $request->status
        ];

        Http::patch($this->databaseUrl . '/evakuasi/' . $id . '.json', $data);

        return redirect()->back()->with('success', 'Status request evakuasi berhasil diperbarui.');
    }
}
