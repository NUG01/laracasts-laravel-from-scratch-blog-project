<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
// use App\View\Components\Category;
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
            'posts'=>Post::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post',[
            'post'=>$post
        ]);
    }
    
     public function create(){


        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()?->username!='nugola7'){
            abort(403);
        
        }

        

        return view('post-admin');
     }
}
