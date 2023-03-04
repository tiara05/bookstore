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

class UserDetailController extends Controller
{
    public function index($id)
    {
        $kategori = Kstegori::all();

        $produk = Produk::find($id);

        return view('User.Page.Detail.Detail', compact('produk', 'kategori'));
    }
}
