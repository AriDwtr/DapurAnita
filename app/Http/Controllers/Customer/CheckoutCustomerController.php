<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Keranjang;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutCustomerController extends Controller
{
    public function get_ongkir($id_kota, $berat)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=399&destination=" . $id_kota . "&weight=" . $berat . "&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: f201c33f7b1021a48e2a76125bfa5e15"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            $provinsi = $response['rajaongkir']['results'];
            return $provinsi;
        }
    }

    public function index($id)
    {

        $cek_alamat = Alamat::where('id_user', Auth::user()->id)->first();
        if ($cek_alamat == NULL) {
            return to_route('alamat.create');
        }


        $pengiriman = Alamat::where('id_user', Auth::user()->id)->first();
        $keranjang = Keranjang::join('produk','produk.id_produk','=','keranjang.id_produk')
        ->select('keranjang.*','produk.nama_produk','produk.harga_produk','produk.foto_produk','produk.berat')
        ->find($id);
        $rekening = Rekening::orderBy('jenis_rekening', 'asc')->get();

        $berat = $keranjang->berat * $keranjang->quantity;
        $id_kota =$pengiriman->id_kota;

        $ongkir = $this->get_ongkir($id_kota, $berat);

        // dd($ongkir);
        return view('customer.checkout.checkout', compact(['keranjang','ongkir','berat','pengiriman','rekening']));
    }
}
