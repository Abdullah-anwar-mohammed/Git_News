<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
      
        return view('admin.home');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect(Route('admin.login'));
    }
}
