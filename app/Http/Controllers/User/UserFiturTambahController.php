<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Produk;
use App\Models\Kstegori;
// use App\Models\Favorit;
// use App\Models\Review;

use Session;
use Alert;

class UserFiturTambahController extends Controller
{
    public function index()
    {
        return view('User.Page.FiturTambah.Tambah');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'inputsatu'         => 'required',
            'inputdua'          => 'required',
        ]);

        $a = strtolower($request->inputsatu);
        $b = strtolower($request->inputdua);

        $count1 = strlen($a);
        $count2 = 0;

        for ($i = 0; $i < $count1; $i++) {
            if (strpos($a, $b[$i]) !== false)
            {
                $count2++;
            }
        };

        $percentage = ($count2 / $count1) * 100;

        return view('User.Page.FiturTambah.Hasil', compact('percentage'));
       
    }
}
