<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produk;

class UserHomeController extends Controller
{
    public function index()
    {
        $produk = Produk::where('status', 'Ada')->where('stok_produk', '>=', '1')->paginate(8);

        return view('User.Page.Home.Home', compact('produk'));
    }
}
