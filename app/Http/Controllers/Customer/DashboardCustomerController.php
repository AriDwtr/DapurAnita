<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardCustomerController extends Controller
{
    public function index()
    {
        $produk = Produk::join('kategori','kategori.id_kategori','=','produk.id_kategori')
        ->select('produk.*','kategori.nama_kategori')
        ->orderBy('produk.created_at', 'desc')
        ->limit(4)
        ->get();

        return view('customer.dashboard.dashboard', compact(['produk']));
    }
}
