<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'Nama_barang',
        'Nama_peminjam',
        'Tanggal_pinjam',
        'Tanggal_balikin',
        'Jumlah_barang',
        'Status_barang',
        'alatolahraga_id',
    ];
}
