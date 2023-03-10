<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostCommentsController\storeCom;
use Illuminate\Validation\ValidationException;
use App\Services\Newsletter2;

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

Route::post('newsletter',function(Newsletter2 $newsletter){
    request()->validate(['email'=>'required|email']);
  
    // $mailchimp = new \MailchimpMarketing\ApiClient();

    // $mailchimp->setConfig([
    //     'apiKey' => config('services.mailchimp.key'),
    //     'server' => 'us9'
    // ]);
    try{
    //   $newsletter=new Newsletter2();

    //   $newsletter->subscribe(request('email'));

    $newsletter->subscribe(request('email'));

    }catch(\Exception $e){
       \Illuminate\Validation\ValidationException::withMessages([
        'email'=>'This email could not be added to our newsletter list.'
       ]);
    }
    return redirect('/')->with('success','You are now signed up for our newsletter!');
});


Route::get('/', [PostController::class,'index']);

Route::get('posts/{post:slug}',[PostController::class,'show']);

Route::get('categories/{category:slug}',function(Category $category){
    return view('posts',[
        'posts'=>$category->posts,
        'currentCategory'=>$category,
        'categories'=>Category::all()
    ]);
});


Route::get('authors/{author:username}',function(User $author){
    return view('posts',[
        'posts'=>$author->posts

    ]);
});
Route::post('posts/{post:slug}/comments', [PostCommentsController::class,'storeCom']);

Route::get('register',[RegisterController::class, 'create' ])->middleware('guest');
Route::post('register',[RegisterController::class, 'store' ])->middleware('guest');
Route::get('login',[SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions',[SessionsController::class, 'store'])->middleware('guest');
Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');



Route::get('admin/posts/create', [PostController::class,'create']);
Route::post('admin/posts', [PostController::class,'store']);