<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'stok',
        'harga',
        'kategori',
        'gambar',
        'tgl_produksi',
        'tgl_kadaluarsa',
        'berat_isi_bersih',
        'status_produk',
    ];
}
