<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\KategoriAset;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asets = Aset::with('kategori')->get();
        return view('guest/aset.index', compact('asets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriAset::all();
        return view('guest/aset.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'kode_aset' => 'required|unique:aset',
            'nama_aset' => 'required',
            'tgl_perolehan' => 'required|date',
            'nilai_perolehan' => 'required|numeric',
            'kondisi' => 'required',
        ]);

        Aset::create($validated);
        return redirect()->route('aset.index')->with('success', 'Data aset berhasil ditambahkan');
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
    public function edit(Aset $aset)
    {
        $kategori = KategoriAset::all();
        return view('guest/aset.edit', compact('aset', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aset $aset)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'kode_aset' => 'required',
            'nama_aset' => 'required',
            'tgl_perolehan' => 'required|date',
            'nilai_perolehan' => 'required|numeric',
            'kondisi' => 'required',
        ]);

        $aset->update($validated);
        return redirect()->route('aset.index')->with('success', 'Data aset berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $aset)
    {
        $aset->delete();
        return redirect()->route('aset.index')->with('success', 'Data aset berhasil dihapus');
    }
}
