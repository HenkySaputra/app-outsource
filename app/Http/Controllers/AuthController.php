<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function sign_in()
    {
        return view('umum/auth/login');
    }

    public function sign_up()
    {
        return view('umum/auth/sign_up');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role != "Admin") {
                Auth::logout();
                return back()->with('loginError', 'The credentials do not match with our records.');
            }
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'The credentials do not match with our records.');
    }

    public function registration(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email:dns|max:255|unique:users',
            'role' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'confirm-password' => 'required|same:password',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect()->route('Login')->with(
            'success',
            'Registration Success.'
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
