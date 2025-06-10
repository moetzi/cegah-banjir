<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvakuasiRequest extends Model
{
    protected $fillable = ['nama', 'telepon', 'jumlah_orang', 'keterangan'];

}
