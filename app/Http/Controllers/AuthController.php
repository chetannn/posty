<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginStore()
    {
        \request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        auth()->attempt(\request()->only(['email', 'password']));

        return redirect('/posts');
    }

    public function register()
    {
        return view('register');
    }

    public function registerStore()
    {
        \request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => \request()->get('name'),
            'email' => \request()->get('email'),
            'password' => bcrypt(\request()->get('password')),
        ]);

        auth()->attempt(\request()->only(['email', 'password']));

        return redirect('/posts');
    }

    public function logout()
    {
        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }
}
