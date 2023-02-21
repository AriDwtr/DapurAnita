<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlamatUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
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

    public function get_city()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
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
            $city = $response['rajaongkir']['results'];
            return $city;
        }
    }

    public function index()
    {
        $provinsi = $this->get_provinsi();
        $city = $this->get_city();
        $alamat = Alamat::where('id_user', Auth::user()->id)->first();

        if ($alamat == NULL) {
            return to_route('alamat.create');
        }
        return view('customer.alamat.alamat', compact(['alamat','provinsi','city']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = $this->get_provinsi();
        $city = $this->get_city();

        $alamat = Alamat::where('id_user', Auth::user()->id)->first();

        if ($alamat == NULL) {
            return view('customer.alamat.alamat_create', compact(['provinsi','city']));
        }
        return to_route('alamat.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'kode_pos'=>'required',
            'telp'=>'required',
            'alamat'=>'required',
            'provinsi' => 'required',
            'kota' => 'required',
        ]);

        $provinsi = $request->provinsi;
        $provinsi_result = explode('|', $provinsi);
        $id_provinsi = $provinsi_result[0];
        $nama_provinsi = $provinsi_result[1];

        $kota = $request->kota;
        $kota_result = explode('|', $kota);
        $id_kota = $kota_result[0];
        $nama_kota = $kota_result[1];

        Alamat::create([
            'id_user' => Auth::user()->id,
            'no_telp' => $request->telp,
            'nama_penerima' => $request->nama,
            'id_provinsi' => $id_provinsi,
            'nama_prov' => $nama_provinsi,
            'id_kota' => $id_kota,
            'nama_kota' => $nama_kota,
            'kode_pos' => $request->kode_pos,
            'alamat_lengkap' => $request->alamat,

        ]);

        return to_route('alamat.index')->with('success', 'Berhasil Menambahkan Alamat Pengiriman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required',
            'kode_pos'=>'required',
            'telp'=>'required',
            'alamat'=>'required',
            'provinsi' => 'required',
            'kota' => 'required',
        ]);

        $provinsi = $request->provinsi;
        $provinsi_result = explode('|', $provinsi);
        $id_provinsi = $provinsi_result[0];
        $nama_provinsi = $provinsi_result[1];

        $kota = $request->kota;
        $kota_result = explode('|', $kota);
        $id_kota = $kota_result[0];
        $nama_kota = $kota_result[1];

        Alamat::find($id)->update([
            'id_user' => Auth::user()->id,
            'no_telp' => $request->telp,
            'nama_penerima' => $request->nama,
            'id_provinsi' => $id_provinsi,
            'nama_prov' => $nama_provinsi,
            'id_kota' => $id_kota,
            'nama_kota' => $nama_kota,
            'kode_pos' => $request->kode_pos,
            'alamat_lengkap' => $request->alamat,

        ]);
        return back()->with('success', 'Berhasil Memperbaharui Alamat Pengiriman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
