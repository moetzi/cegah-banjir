<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class PublicController extends Controller
{
    public function statusBanjir()
    {
        $json = File::get(public_path('data/dummy_monitoring_data.json'));
        $data = json_decode($json, true);

        return view('public.status-banjir', ['data' => $data['monitoring_data']]);
    }
}
