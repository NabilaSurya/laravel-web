<?php

namespace App\Http\Controllers;

use App\Models\KategoriAset;

use Illuminate\Http\Request;

class KategoriAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriAsets = KategoriAset::all();

        return view('guest.index', compact('kategoriAsets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // 1. Validasi Data
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'kode' => 'required|unique:kategori_aset,kode|max:10',
            'deskripsi' => 'nullable',
        ]);

        // 2. Simpan Data ke Database
        KategoriAset::create($validatedData);

        // 3. Redirect dengan pesan sukses
        return redirect()->route('kategori_aset.index')->with('success', 'Kategori aset baru berhasil disimpan.');
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
