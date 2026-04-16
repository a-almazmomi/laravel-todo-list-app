<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with('Error', 'Invalid Email or Password');
    }

    function register()
    {
        // This is mean go to auth/register.blade.php and return register.blade.php file. 
        return view('auth.register');
    }

    function registerPost(Request $request)
    {
        $request->validate([
            // These name, email, and password come from register.blade.php with same name in input tag.
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            // 'password' => 'required|min:8|confirmed',
        ]);
        $user = new User();
        // These $user->name, email, and password come from User.php model with same name in $fillable array.
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return redirect(route('login'))->with('success', 'Registration successful. Please log in.');
        }
        return redirect(route('register'))->with('error', 'Registration failed. Please try again.');
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
