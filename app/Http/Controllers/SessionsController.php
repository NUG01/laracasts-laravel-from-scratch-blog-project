<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ValidationException;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success','GoodBye!');
    }
    public function store()
    {
     $attributes=  request()->validate([
        'email'=>'required|email',
        'password'=>'required'
       ]);

       if(auth()->attempt($attributes)){
        return redirect('/')->with('success','Welcome Back!');
       }

    //    ValidationException::withMessages([
    //     'email'=>'Your provided credentials could not be verified.'
    //    ]);

    return back()->withInput()->withErrors(['email'=>'You provided credentials could not be verified.']);
    }
    public function create()
    {
       

        return view('create');
    }
}
