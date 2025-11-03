<?php

namespace App\Http\Controllers;

use App\Models\KategoriAset;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // <-- Import Rule

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
        $kategoriAset = KategoriAset::findOrFail($id);
        return view('guest.edit', compact('kategoriAset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Cari Kategori Aset berdasarkan ID terlebih dahulu untuk mendapatkan nama primary key yang benar
        $kategoriAset = KategoriAset::findOrFail($id);
        $primaryKey = $kategoriAset->getKeyName();

        // 2. Validasi Data
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'kode' => [
                'required',
                'max:10',
                // Perbaikan Dinamis: Menggunakan getKeyName() dari Model untuk mendapatkan kolom primary key yang benar.
                Rule::unique('kategori_aset', 'kode')->ignore($kategoriAset->getKey(), $primaryKey),
            ],
            'deskripsi' => 'nullable',
        ]);

        // 3. Update Data
        $kategoriAset->update($validatedData);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('kategori_aset.index')->with('success', 'Kategori aset berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. Cari Kategori Aset berdasarkan ID
        $kategoriAset = KategoriAset::findOrFail($id);

        // 2. Hapus Data
        $kategoriAset->delete();

        // 3. Redirect dengan pesan sukses
        return redirect()->route('kategori_aset.index')->with('success', 'Kategori aset berhasil dihapus.');
    }
}
