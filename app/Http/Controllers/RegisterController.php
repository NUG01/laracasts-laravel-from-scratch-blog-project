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
        'name'=>'required',
        'username'=>'required',
        'email'=>'required|email',
        'password'=>'required|min:7|max:255',
        // 'name'=>'required|max:255',
        // 'username'=>'required|max:255|min:3',
        // 'email'=>'required|email|max"255|min:7',
        // 'password'=>'required|min:7|max:255',
    ]);

    User::create($attributes);

    return redirect('/');
   }
}
