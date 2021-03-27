<?php

namespace App\Http\Controllers\frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::paginate(5);
        $data['categories'] = Category::all();
        return view('frontend.index')->with($data);
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('front.home'));
    }

    public function getByCat($name)
    {   
        $ID = Category::where('name',$name)->get();
        $data['count_post'] = Post::where('cat_id',$ID[0]['id'])->count();
        $data['posts'] = Post::where('cat_id',$ID[0]['id'])->paginate(5);
        $data['categories'] = Category::all();
        return view('frontend.cat')->with($data);
      
    }

    public function searchpost(Request $req)
    {
        $search = $req->get('search');
        $Post['posts'] = DB::table('posts')->where('title','like','%'.$search.'%')->paginate(2);
        $Post['categories'] = Category::all();
        $Post['count'] = $Post['posts']->count();
        return view('frontend.search')->with($Post);
    }
}
