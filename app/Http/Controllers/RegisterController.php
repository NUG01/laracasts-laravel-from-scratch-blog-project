<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Validator;

class RegisterController extends Controller
{
   public function create()
   {
    return view('register.create');
   }
   public function store()
   {
   $attributes = request()->validate([
        'name'=>'required|max:255',
        'username'=>'required|min:3|max:255|unique:users,username',
        'email'=>'required|email|max:255|unique:users,email',
        'password'=>'required|min:7|max:255',
        // 'name'=>'required|max:255',
        // 'username'=>'required|max:255|min:3',
        // 'email'=>'required|email|max"255|min:7',
        // 'password'=>'required|min:7|max:255',
    ]);
$attributes['password']=bcrypt($attributes['password']);

  $user= User::create($attributes);


    session()->flash("success", "Your account has been created.");

    auth()->login($user);

    return redirect('/');
   }
}
