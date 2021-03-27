<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function dologin(Request $req)
    {
        $data = $req->validate([
            'email'=>'required|email|max:191',
            'password'=>'required|string',
        ]);

      if(!Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']]))
      {
          return back();
      }else
      {
          return redirect(route('admin.home'));
      }
    }
}
