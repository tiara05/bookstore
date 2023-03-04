<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

use Session;

class UserActivityController extends Controller
{
    public function index()
    {
        $order = Order::with(['produk'])->where('id_user', Auth::user()->id)->get();

        $trans = Pembayaran::orderBy('created_at', 'desc')->where('id_user', Auth::user()->id)->get();

        return view('User.Page.Activity.Activity', compact('order', 'trans'));
    }

    public function detail($id)
    {
        $order = Order::with(['produk'])->find($id);

        $trans = Pembayaran::orderBy('created_at', 'desc')->where('id_user', Auth::user()->id)->get();

        // dd($order);
        return view('User.Page.Activity.DetailActivity', compact('order', 'trans'));
    }
}
