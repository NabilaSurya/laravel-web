<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Media;
use App\Models\KategoriAset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $asets = Aset::with(['kategori', 'mainPhoto'])
            ->search($request, ['nama_aset', 'kode_aset'])
            ->filterTanggal($request)
            ->filterKategori($request)
            ->paginate(10)
            ->withQueryString();


        $kategori = KategoriAset::all();

        return view('guest.aset.index', compact('asets', 'kategori'));
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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $aset = Aset::create($validated);

        // simpan ke tabel media
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('aset', 'public');

            Media::create([
                'ref_table' => 'aset',
                'ref_id' => $aset->aset_id,
                'file_name' => $path,
                'mime_type' => $request->file('foto')->getMimeType(),
                'sort_order' => 1,
            ]);
        }

        return redirect()->route('aset.index')->with('success', 'Data aset berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aset = Aset::with(['kategori', 'media'])->findOrFail($id);

        return view('guest.aset.show', compact('aset'));
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
            'kode_aset' => 'required|unique:aset,kode_aset,' . $aset->aset_id . ',aset_id',
            'nama_aset' => 'required',
            'tgl_perolehan' => 'required|date',
            'nilai_perolehan' => 'required|numeric',
            'kondisi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // update data aset (TANPA foto)
        $aset->update($validated);

        // jika upload foto baru
        if ($request->hasFile('foto')) {

            // ambil foto lama (jika ada)
            $oldMedia = $aset->media()
                ->where('ref_table', 'aset')
                ->first();

            // hapus file & record lama
            if ($oldMedia) {
                if (Storage::disk('public')->exists($oldMedia->file_name)) {
                    Storage::disk('public')->delete($oldMedia->file_name);
                }
                $oldMedia->delete();
            }

            // simpan foto baru
            $path = $request->file('foto')->store('aset', 'public');

            Media::create([
                'ref_table' => 'aset',
                'ref_id' => $aset->aset_id,
                'file_name' => $path,
                'mime_type' => $request->file('foto')->getMimeType(),
                'sort_order' => 1,
            ]);
        }

        return redirect()
            ->route('aset.index')
            ->with('success', 'Data aset berhasil diperbarui');
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
