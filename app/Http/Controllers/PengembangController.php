<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengembangController extends Controller
{
    public function index()
    {
        // Data statis (bisa diganti ambil dari DB)
        $data = [
            'nama' => 'Nabila Surya Ramadhani',
            'nim' => '2457301104',
            'kelas' => '2 SI D',
        ];

        return view('guest.diri.index', compact('data'));
    }
}
