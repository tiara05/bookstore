<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\kstegori;
use App\Models\produk;
use App\Models\Pembayaran;

use Session;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $pelanggan = User::count();

            $kategori = Kstegori::count();

            $produk = Produk::count();

            $order = Pembayaran::count();

            return view('Admin.Page.Dashboard.Dashboard', compact('pelanggan', 'kategori', 'produk', 'order'));
        }
        else{
            return redirect()->route('loginadmin');
        }
    }
}
