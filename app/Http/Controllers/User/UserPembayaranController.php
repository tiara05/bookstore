<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\User;
use App\Models\Pembayaran;
use App\Models\Order;
use Session;

class UserPembayaranController extends Controller
{
    public function index($id)
    {
        $bayar = Pembayaran::findOrFail($id);
        return view('User.Page.Bayar.Bayar', compact('bayar'));
    }

    public function updateimg($id, Request $request)
    {
        if(Session::has('user')){

            $request->validate([
                'foto' => 'mimes:jpg,jpeg,png',
            ]);

            $user_id = Auth::user()->id;

            $bayar = Pembayaran::find($id);
            
                if ($files = $request->file('foto')) {
                    $destinationPath = 'buktipembayaran/';
                    $file = $request->file('foto');
                    // upload path  
        
                    $profileImage = basename($request->file('foto')->getClientOriginalName(), '.' . $request->file('foto')->getClientOriginalExtension()) . "." .
                        $files->getClientOriginalExtension();
                    $pathImg = $file->storeAs('', $profileImage);
                    $files->move($destinationPath, $profileImage);
                    $bayar->buktibayar = $pathImg;
                }

                $bayar->status = 'Sudah Upload Bukti Pembayaran';
                $bayar->save();

            return redirect()->route('activity.index');
        }
    }
}
