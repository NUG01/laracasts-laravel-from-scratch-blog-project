<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Post;
use App\Http\Controllers;
use App\Models\Post;

class PostCommentsController extends Controller
{
 public function storeCom(Post $post)
 {

    request()->validate([
        'body'=>'required'
    ]);
$post->comments()->create([
    'user_id'=>request()->user()->id,
    'body'=>request('body')
]);
return back();
 }
}
