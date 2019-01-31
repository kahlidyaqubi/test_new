<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {

          $posts=Post::all();
        return view("posts.index",compact('posts'));
    }

    public function create()
    {
        return view("posts.create");
    }
    public function show($id)
    {
        $post=Post::find($id);
        return view("posts.show", compact('post'));
    }
    public function store(Request $request)
    {
        $request['user_id']=auth()->user()->id;

        Post::create($request->all());
        return view("posts.index");

    }

}