<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

//for logging in and signing out
class SessionController extends Controller
{

    public function create(){
        return view('auth.login');
    }

    public function store(){
        //rules
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        //check credentials
        if(! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match our records.'
            ]);
        }
        //regenerate session token
        request()->session()->regenerate();
        
        return redirect('/');
    }

    public function destroy(){
        Auth::logout();

        return redirect('/');
    }
}
