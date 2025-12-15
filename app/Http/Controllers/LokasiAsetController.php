<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Media;
use App\Models\LokasiAset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LokasiAsetController extends Controller
{
    public function index()
    {
        $lokasiAsets = LokasiAset::with('aset')->latest()->get();
        return view('guest.lokasi-aset.index', compact('lokasiAsets'));
    }

    public function create()
    {
        $asets = Aset::all();
        return view('guest.lokasi-aset.create', compact('asets'));
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id', // ganti 'id' jadi 'aset_id'
            'lokasi_text' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        // Debug (opsional)
        // dd($request->all());

        // Simpan lokasi aset
        $lokasi = LokasiAset::create([
            'aset_id' => $request->aset_id,
            'lokasi_text' => $request->lokasi_text,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'keterangan' => $request->keterangan,
        ]);

        // Upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('lokasi_aset', 'public');

            Media::create([
                'ref_table' => 'lokasi_aset',
                'ref_id' => $lokasi->lokasi_id,
                'file_name' => $path,
                'caption' => 'Foto lokasi aset',
                'mime_type' => $file->getClientMimeType(),
                'sort_order' => 1
            ]);
        }

        return redirect()->route('lokasi-aset.index')
            ->with('success', 'Lokasi aset berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $lokasiAset = LokasiAset::findOrFail($id);
        $asets = Aset::all();
        return view('guest.lokasi-aset.edit', compact('lokasiAset', 'asets'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id', // ganti 'id' jadi 'aset_id'
            'lokasi_text' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $lokasi = LokasiAset::findOrFail($id);
        $lokasi->update([
            'aset_id' => $request->aset_id,
            'lokasi_text' => $request->lokasi_text,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            $lokasi->media()->each(function ($m) {
                if (Storage::disk('public')->exists($m->file_name)) {
                    Storage::disk('public')->delete($m->file_name);
                }
                $m->delete();
            });

            $file = $request->file('foto');
            $path = $file->store('lokasi_aset', 'public');

            Media::create([
                'ref_table' => 'lokasi_aset',
                'ref_id' => $lokasi->lokasi_id,
                'file_name' => $path,
                'caption' => 'Foto lokasi aset',
                'mime_type' => $file->getClientMimeType(),
                'sort_order' => 1
            ]);
        }

        return redirect()->route('lokasi-aset.index')
            ->with('success', 'Lokasi aset berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lokasi = LokasiAset::findOrFail($id);

        // Hapus foto terkait
        $lokasi->media()->each(function ($m) {
            if (Storage::disk('public')->exists($m->file_name)) {
                Storage::disk('public')->delete($m->file_name);
            }
            $m->delete();
        });

        $lokasi->delete();

        return redirect()->route('lokasi-aset.index')
            ->with('success', 'Lokasi aset berhasil dihapus.');
    }
}
