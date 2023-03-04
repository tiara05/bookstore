<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Pembayaran;

use Session;

class AdminOrderController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $order = Order::with(['produk'])->get();

            $trans = Pembayaran::orderBy('created_at', 'desc')->get();

            return view('Admin.Page.DataPemesanan.DataPemesanan',  compact('order', 'trans'));
        }
        else{
            return redirect()->route('loginadmin');
        }
    }
}
