<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

// $files=File::files(resource_path('posts'));
// // $posts=[];
// $posts=array_map(function($file){
//     $document=YamlFrontMatter::parseFile($file);
// return new Post($document->title,$document->excerpt,$document->date,$document->body(),$document->slug,);
// },$files);


// $posts=collect(File::files(resource_path('posts')))->map(function($file){
//     return YamlFrontMatter::parseFile($file);
// })->map(function($document){
//     return new Post($document->title,$document->excerpt,$document->date,$document->body(),$document->slug,);
// });

$posts=Post::all();
 
    return view('posts',[
        'posts'=>$posts
    ]);
});

Route::get('posts/{post}',function($slug){
    $post=Post::find($slug);
return view('post',[
    'post'=>$post
]);
});