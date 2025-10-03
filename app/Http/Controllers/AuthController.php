<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
      public function index()
    {
        return view('auth.guest-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/' //Semua Huruf Kapita;
            ]
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus minimal 3 karakter dan mengandung huruf kapital.',
            'password.regex' => 'Password harus minimal 3 karakter dan mengandung huruf kapital.',
        ]);

        return redirect('/inventaris')->with('success', 'Login berhasil, selamat datang ' . $request->username . '!');
    }

}
