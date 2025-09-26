<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Daftar Inventaris Aset";

        $asets = [
            [
                'kode_aset' => 'AST-001',
                'nama_aset' => 'Laptop Dell',
                'kategori' => 'Elektronik',
                'lokasi' => 'Ruang IT',
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'AST-002',
                'nama_aset' => 'Proyektor Epson',
                'kategori' => 'Elektronik',
                'lokasi' => 'Ruang Rapat',
                'kondisi' => 'Perlu Perbaikan',
            ],
            [
                'kode_aset' => 'AST-003',
                'nama_aset' => 'Kursi Kerja',
                'kategori' => 'Furniture',
                'lokasi' => 'Ruang Staff',
                'kondisi' => 'Baik',
            ],
        ];

        return view('aset', compact('title', 'asets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
