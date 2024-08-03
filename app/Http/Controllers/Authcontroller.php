<?php

namespace App\Http\Controllers;

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
        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return $this->authenticated($request, $user);
        }

        return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
    }

    public function signup()
    {
        return view("auth.signup");
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role == 'client') {
            return redirect()->route('client.dashboard');
        }

        return redirect('/home'); // Default fallback
    }

    public function signupPost(Request $request)
    {
        $request->validate([
            'first' => 'required|string|max:255',
            'last' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'pass' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,client'
        ]);

        $user = User::create([
            'name' => $request->first,
            'last_name' => $request->last,
            'email' => $request->email,
            'password' => Hash::make($request->pass),
            'role' => $request->role,
        ]);

        if ($user) {
            return redirect(route("login"))->with("success", "User created successfully");
        }

        return redirect(route("signup"))->with("error", "Failed to create account");
    }
}
