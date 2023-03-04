<?php

namespace App\Http\Controllers\User\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Produk;
use App\Models\Nelayan;
use App\Models\User;
use App\Models\cart;

use Session;

class MarketplaceCartController extends Controller
{
    public function index()
    {
            $cart = Cart::with(['produk'])->where('id_user', Auth::user()->id)->pluck('id_nelayan');

            $ca = Nelayan::whereIn('id', $cart)->get();

            $rt = Cart::with(['produk'])->whereIn('id_nelayan', $cart)->where('id_user', Auth::user()->id)->get();

            $tot = Cart::sum('harga');
            
            // dd($rt);
            return view('User.Page.Marketplace.Page.Cart.Cart', compact('tot', 'ca', 'rt'));
    }

    public function create($id, Request $request)
    {
            $request->validate([
                'jumlah'        => 'required',
            ]);

            $produk = Produk::find($id)->id;

            $langsung = Produk::find($id)->hargalangsung;
            $bersih = Produk::find($id)->hargabersih;
            $fillet = Produk::find($id)->hargafillet;

            $user_id = Auth::user()->id;

            $pro = Produk::find($id);

            $cek = Cart::with(['produk'])->where('id_user', Auth::user()->id)->where('id_produk', $produk)->first();
            
            if($request->jumlah > $pro->stok_produk)
            {
                return redirect(route('home.view', $pro->id))->with(['success' => 'Stok Tidak Tersedia']);
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
                    $cart->id_nelayan = $pro->id_nelayan;
                    $cart->jumlah = $request->jumlah;
                    if($request->pengolahan == null)
                    {
                        if($pro->id_kategori == "3")
                        {
                            $cart->pengolahan = "Olahan Ikan";
                        }
                        else
                        {
                            $cart->pengolahan = "Langsung";
                        }
                    }
                    else{
                        $cart->pengolahan = $request->pengolahan;
                    }

                    if($request->pengolahan == "Dibersihkan"){
                        $cart->harga = $bersih;
                    }
                    elseif($request->pengolahan == "Fillet"){
                        $cart->harga = $fillet;
                    }
                    else{
                        $cart->harga = $langsung;
                    }
                    
                    
                    $cart->save();
                    Session::put('cart', $cart);

                    $pro->stok_produk = $pro->stok_produk - $request->jumlah;
                    $pro->save();
                }
            }

            return redirect(route('cart.index'));
    }

    public function delete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect(route('cart.index'))->with(['success' => 'Delete Cart Berhasil']);
    }

    public function updatemin($id)
    {
        $pro = Produk::find($id);

        $cart = Cart::where('id_produk', $id)->first();

        $cart->jumlah     = $cart->jumlah - 1;
        $cart->save();
        Session::put('cart', $cart);

        $pro->stok_produk = $pro->stok_produk + 1;
        $pro->save();

        return redirect(route('cart.index'));
    }

    public function updateplus($id)
    {
        $pro = Produk::find($id);
        
        $cart = Cart::where('id_produk', $id)->first();

        $cart->jumlah     = $cart->jumlah + 1;
        $cart->save();
        Session::put('cart', $cart);

        $pro->stok_produk = $pro->stok_produk - 1;
        $pro->save();

        return redirect(route('cart.index'));
    }

}
