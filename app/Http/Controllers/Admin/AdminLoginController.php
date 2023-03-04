<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminLoginVerifyRequest;
use Illuminate\Http\Request;

use App\Models\Admin;
use Session;

class AdminLoginController extends Controller
{
    public function loginadmin()
    {
            return view('Admin.Auth.Login');
    }

    public function proses_loginadmin(request $request)
    {
        $username = request('username');
        $password = request('password');

        $admin = Admin::where('username', $username)->first();
        
        if($admin==null)
        {
            $request->session()->flash('error', 'Invalid Username');
            
            return redirect(route('loginadmin'));
        }
        
        else
        {
            if($password == $admin -> password)
            {
                session()->put('admin',$admin);
                //$request->session()->put('username', $request->Username);
                return redirect(route('dashboard.index'));
            }
            else if($request->Password!=$admin->password)
            {
                return view('Admin.Auth.Login')->with(['success' => 'Invalid Password']);
            }
        }
    }

    public function logoutadmin(Request $request)
    {
        $user = Auth::user();
        $request->session()->forget('admin', $user);
        return Redirect('loginadmin');
    }
}
