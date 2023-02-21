<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = [
        'id_produk',
        'id_user',
        'quantity',
        'harga_total_bayar',
        'ongkir',
        'total_ongkir',
        'bukti_bayar',
        'total_dp',
        'bukti_bayar_dp',
        'bukti_bayar_dp_lunas',
        'dp_status',
        'status',
        'tipe_pembayaran',
    ];

}
