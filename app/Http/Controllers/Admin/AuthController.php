<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('books')
                ->withSuccess('Signed in');
        }

        return redirect("admin")->withSuccess('Login details are not valid');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect('admin');
    }
}