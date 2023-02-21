<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileCustomerController extends Controller
{
    public function index()
    {
        return view('customer.profile.profile');
    }

    public function update_foto(Request $request, $id)
    {
        if ($request->hasFile('img1')) {
            $foto_profile = $request->file('img1')->getClientOriginalName();
            $request->img1->move(public_path('foto_profile'), $foto_profile);
        }

        User::find($id)->update([
            'foto_profile' => $foto_profile
        ]);

        return back()->with('success', 'Berhasil Memperbaharui Foto Profile');
    }

    public function update_data(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'email|required',
            'telp' => 'required'
        ]);

        User::find($id)->update([
            'name' => $request->nama,
            'email' => $request->email,
            'hp' => $request->telp,
        ]);

        return back()->with('success', 'Berhasil Memperbaharui Profile');
    }

    public function update_password(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6',
            'repassword' => 'required|min:6|same:password'
        ]);

        User::find($id)->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Berhasil Memperbaharui Password Akun');
    }
}
