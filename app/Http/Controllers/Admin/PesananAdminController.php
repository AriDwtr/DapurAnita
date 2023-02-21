<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Resi;
use Illuminate\Http\Request;

class PesananAdminController extends Controller
{
    public function lihat_pesanan()
    {
        $pesanan = Pesanan::join('produk','produk.id_produk','=','pesanan.id_produk')
        ->join('alamat_user','alamat_user.id_user','=','pesanan.id_user')
        ->select('pesanan.*','alamat_user.alamat_lengkap','alamat_user.nama_penerima','alamat_user.no_telp','alamat_user.nama_prov','alamat_user.nama_kota','alamat_user.no_telp','produk.nama_produk','produk.harga_produk','produk.foto_produk','produk.berat')
        ->where('pesanan.status', 1)
        ->get();
        return view('admin.pesanan.pesanan_list', compact(['pesanan']));
    }

    public function terima_pesanan($id)
    {
        $pesanan = Pesanan::find($id);
        $id_produk = $pesanan->id_produk;
        Produk::where('id_produk', $id_produk)
        ->decrement('stok', $pesanan->quantity);
        Pesanan::find($id)->update([
            'status'=>2
        ]);

        return to_route('admin.pesanan_prosses');
    }

    public function tolak_pesanan($id)
    {
        Pesanan::find($id)->update([
            'status'=>0
        ]);

        return back();
    }

    public function pesanan_onprosses()
    {
        $pesanan = Pesanan::join('produk','produk.id_produk','=','pesanan.id_produk')
        ->join('alamat_user','alamat_user.id_user','=','pesanan.id_user')
        ->select('pesanan.*','alamat_user.alamat_lengkap','alamat_user.nama_penerima','alamat_user.no_telp','alamat_user.nama_prov','alamat_user.nama_kota','alamat_user.no_telp','produk.nama_produk','produk.harga_produk','produk.foto_produk','produk.berat')
        ->where('pesanan.status', 2)
        ->get();

        return view('admin.pesanan.pesanan_onprosses', compact(['pesanan']));
    }

    public function invoice($id)
    {
        $pesanan = Pesanan::join('produk','produk.id_produk','=','pesanan.id_produk')
        ->join('alamat_user','alamat_user.id_user','=','pesanan.id_user')
        ->select('pesanan.*','alamat_user.alamat_lengkap','alamat_user.nama_penerima','alamat_user.no_telp','alamat_user.nama_prov','alamat_user.nama_kota','alamat_user.no_telp','produk.nama_produk','produk.harga_produk','produk.foto_produk','produk.berat')
        ->find($id);
        return view('admin.invoice.invoice', compact(['pesanan']));
    }

    public function pesanan_kirim(Request $request)
    {
        Resi::create([
            'id_pesanan'=>$request->id_pesanan,
            'no_resi'=>$request->resi
        ]);

        $id = $request->id_pesanan;

        Pesanan::find($id)->update([
            'status'=>'3'
        ]);

        return to_route('admin.pesanan_deliver');
    }

    public function pesanan_deliver()
    {
        $pesanan = Pesanan::join('produk','produk.id_produk','=','pesanan.id_produk')
        ->join('alamat_user','alamat_user.id_user','=','pesanan.id_user')
        ->select('pesanan.*','alamat_user.alamat_lengkap','alamat_user.nama_penerima','alamat_user.no_telp','alamat_user.nama_prov','alamat_user.nama_kota','alamat_user.no_telp','produk.nama_produk','produk.harga_produk','produk.foto_produk','produk.berat')
        ->where('pesanan.status', 3)
        ->get();

        return view('admin.pesanan.pesanan_deliver', compact(['pesanan']));
    }

    public function pesanan_dp_tagihan($id)
    {
        Pesanan::find($id)->update([
            'dp_status'=>'tagihan',
        ]);
        return back();
    }

    public function tolak_sisa($id)
    {
        Pesanan::find($id)->update([
            'dp_status'=>'sisa tolak',
        ]);
        return back();
    }
}
