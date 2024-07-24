<?php

namespace App\Http\Controllers;

use App\Livewire\Users;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only("email","password");
        if(Auth::attempt($credentials)){
            return redirect()->intended (route("home"));
        }
    }

    public function signup()
    {
        return view("auth.signup");
    }

    public function signupPost(Request $request)
    {
        /* $user = new User();
        $user->name = $request->first;
        $user->last_name = $request->last;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass); */

        $user= User::create([
         'name' => $request->first,
            'last_name'=> $request->last,
            'email' =>$request->email,
            'password'=> Hash::make($request->pass),
       ]);
        if ($user) {
            return redirect(route("login"))->with("success", "User created successfully");
        }

            return redirect(route("signup")) ->with("error", "Failed to create account");
    }
}
