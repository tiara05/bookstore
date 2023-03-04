<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminLoginVerifyRequest;
use Session;

use App\Models\User;

class UserRegisterController extends Controller
{
    public function registeruser(Request $request)
    {

        return view('User.Auth.Register');
    }

    public function proses_registeruser(Request $request)
    {

            User::create([
                'name'          => $request -> nama,
                'password'      => Hash::make($request -> password),
                'email'         => $request -> email,
                'alamat'        => $request -> alamat,
                'telepon'       => $request -> telepon,
            ]);

            $user = Auth::user();
            $request->session()->put('user', $user);
            return redirect('/loginuser')->with('success', 'Registrasi Berhasil');
    }
}
