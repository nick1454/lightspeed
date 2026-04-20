<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Middleware\Authenticate;    
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function logout($id)
    
    
        { 
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect ('/login')->with('success', 'You have been logged out.');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|string|min:8|max:32|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:8|max:32',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email or password is incorrect');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email or password is incorrect');
        }

        Auth::login($user);

        return redirect('/dashboard');
    }

}
