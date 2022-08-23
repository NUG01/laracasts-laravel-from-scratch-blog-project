<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
            

        // $posts=Post::all();
         
        // return view('posts',[
        //     'posts'=>Post::latest()->get(),
        //     'categories'=>Category::all()
        // ]);
        return view('posts',[
            'posts'=>Post::latest()->filter(request(['search','category']))->get(),
            'categories'=>Category::all()
        ]);
    }

    public function show(Post $post){
        return view('post',[
            'post'=>$post
        ]);
    }
    

}
