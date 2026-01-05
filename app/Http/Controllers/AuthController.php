<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Menampilkan Form Login
     */
    public function index()
    {
        return view('guest/login.login');
    }
    /**
     * Memproses data login (Otentikasi Database)
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|name',
            'password' => 'required',
        ], [
            'name.required' => 'Username wajib diisi.',
            'name.name' => 'Format username tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended(route('kategori_aset.index'))->with('success', 'Login berhasil!');
        }

        if (request()->input('name') == 'fmi' && request()->input('password') == 'fmi'){
            session ([
                'name' => 'fmi',
                'role' => 'admin'
            ]);
            return redirect()->intended(route('kategori_aset.index'))->with('success', 'Login berhasil!');
        }

        if (request()->input('name') == 'hmn' && request()->input('password') == 'hmn'){
            session ([
                'name' => 'hmn',
                'role' => 'warga'
            ]);
            return redirect()->intended(route('kategori_aset.index'))->with('success', 'Login berhasil!');
        }

        return back()->withInput()->withErrors([
            'email' => 'Username atau Password yang Anda masukkan salah.',
        ]);
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // atau route('home')
    }
}
