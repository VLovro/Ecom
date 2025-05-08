<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        //validate
        $attributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'], //pasword confirmation
        ]);
        //create the user

       $user = User::create($attributes);

        // log in

        Auth::login($user);

        // redirect somewhere

        return redirect('/');
    }
}
