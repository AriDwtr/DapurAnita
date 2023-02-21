<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{


    public function index()
    {
        $pesanan = Pesanan::join('produk','produk.id_produk','=','pesanan.id_produk')
        ->join('alamat_user','alamat_user.id_user','=','pesanan.id_user')
        ->select('pesanan.*','alamat_user.alamat_lengkap','alamat_user.nama_penerima','alamat_user.no_telp','alamat_user.nama_prov','alamat_user.nama_kota','alamat_user.no_telp','produk.nama_produk','produk.harga_produk','produk.foto_produk','produk.berat')
        ->where('pesanan.status', 3)
        ->orWhere('pesanan.status', 4)
        ->get();
        return view('admin.dashboard.dashboard',compact(['pesanan']));
    }
}


