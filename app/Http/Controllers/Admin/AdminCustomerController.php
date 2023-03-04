<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Session;

class AdminCustomerController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){

            $cust = User::paginate(7);

            return view('Admin.Page.DataCustomer.DataCustomer', compact('cust'));
        }
        else{
            return redirect()->route('loginadmin');
        }
    }

    public function show($id)
    {
        $cust = User::findOrFail($id);

        return view('Admin.Page.DataCustomer.Show', compact('cust') );
    }

}
