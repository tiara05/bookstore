<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Produk;
use App\Models\User;
use App\Models\Order;
use App\Models\Pembayaran;
use App\Models\Cart;

$numberorder = Str::random(5);

use Session;

class UserCheckoutController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->get();
        $rt = Cart::with(['produk'])->where('id_user', Auth::user()->id)->get();

        $tot = Cart::where('id_user', Auth::user()->id)
                ->select('produks.harga', 'produks.id as id_produk', 'produks.harga', 'carts.jumlah', 'carts.id as id')
                ->join('produks', 'produks.id', '=', 'carts.id_produk')
                ->sum(Cart::raw('produks.harga * carts.jumlah'));

        if($tot >= 75000 and $tot <=100000)
        {
            $diskon = $tot*5/100;
        }
        elseif($tot > 100000)
        {
            $diskon = $tot*10/100;
        }
        else
        {
	        $diskon = 0;
        }

        $total = $tot-$diskon;

        return view('User.Page.Checkout.Checkout', compact('rt', 'user', 'tot', 'diskon', 'total'));
    }

    public function checkout($id, Request $request)
    {
         
        $request->validate([
            'jumlah'        => 'required',
        ]);

        $produk = Produk::find($id)->id;
        $user_id = Auth::user()->id;

        $pro = Produk::find($id);

        $cek = Cart::with(['produk'])->where('id_user', Auth::user()->id)->where('id_produk', $produk)->first();
        
        if($request->jumlah > $pro->stok_produk)
        {
            return redirect(route('detail.index', $pro->id))->with(['success' => 'Stok Tidak Tersedia']);
        }
        else{
                if ($cek)
                {
                    $cart = Cart::where('id_produk', $produk)->first();

                    $cart->jumlah     = $cart->jumlah + $request->jumlah;
                    $cart->save();
                    Session::put('cart', $cart);

                    $pro->stok_produk = $pro->stok_produk - $request->jumlah;
                    $pro->save();
                }
                else{
                    $cart = new Cart;

                    $cart->id_produk = $produk;
                    $cart->id_user = $user_id;
                    $cart->jumlah = $request->jumlah;                    
                    
                    $cart->save();
                    Session::put('cart', $cart);

                    $pro->stok_produk = $pro->stok_produk - $request->jumlah;
                    $pro->save();
                }
            }

        return redirect(route('checkout.index'));

    }

    public function create(Request $request)
    {
            $cart =  Order::count();        
            $user_id = Auth::user()->id;
            $cr = Cart::with(['produk'])->where('id_user', Auth::user()->id)->get();

            $numberorder = Str::random(5);

            $tot = Cart::where('id_user', Auth::user()->id)
                ->select('produks.harga', 'produks.id as id_produk', 'produks.harga', 'carts.jumlah', 'carts.id as id')
                ->join('produks', 'produks.id', '=', 'carts.id_produk')
                ->sum(Cart::raw('produks.harga * carts.jumlah'));

            $order = new Pembayaran;
            $order->id_user = $user_id;
            $order->no_order = $numberorder;
            $order->total = $request->total;
            $order->pembayaran =  $request->pembayaran;
            $order->save();

            foreach($cr as $c)
            {
                $ordershop = new Order;
                $ordershop->id_produk = $c->id_produk;
                $ordershop->jumlah =  $c->jumlah;
                $ordershop->id_user = $user_id;
                $ordershop->no_order = $numberorder;
                $ordershop->id_pembayaran = $order->id;
                $ordershop->save();

                $c->delete();
            }
            return redirect(route('landing.index'));

    }
}
