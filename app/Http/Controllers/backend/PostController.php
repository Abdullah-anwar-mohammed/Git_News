<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posts['Posts'] = Post::all();
        return view('admin.post.index')->with($Posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Cat = Category::all();
        return view('admin.post.create')->with(['Cat'=>$Cat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'img' => 'required',
            'by_admin' => 'required',
        ]);*/
        $ex = $request->file('img')->extension();
        $name = time().rand(0,1000).".".$ex;
        
        $Post = Post::create([
            'cat_id' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'img' => $name,
            'by_admin' => $request->by_admin,
        ]);
        if($Post){
            $request->file('img')->storeAs('public/uploads/posts/',$name);
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       
        $Post['Post'] = Post::find($id);
        $Post['Category'] = Category::all();
        return view('admin.post.edit')->with($Post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Post = Post::find($id);
        if($request->file('img') !== null){

            unlink(storage_path('app\public\uploads\posts\\'.$request->img_old));
            $ex = $request->file('img')->extension();
            $name = time().rand(0,1000).".".$ex;

            $Post->img = $name;
            $request->file('img')->storeAs('public/uploads/posts/',$name);
        }
    
        $Post->title = $request->title;
        $Post->content = $request->content;
        $Post->cat_id = $request->category;
        $Post->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return back();
    }
}
