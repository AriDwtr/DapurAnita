<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = [
        'nama_produk',
        'id_kategori',
        'berat',
        'stok',
        'harga_produk',
        'deskripsi_produk',
        'foto_produk',
    ];
}
