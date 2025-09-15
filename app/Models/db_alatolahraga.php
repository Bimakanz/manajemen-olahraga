<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class db_alatolahraga extends Model
{
    protected $fillable = [
        'Nama_barang',
        'Status_barang',
        'Gambar_barang',
        'Jumlah_barang',
    ];
}
