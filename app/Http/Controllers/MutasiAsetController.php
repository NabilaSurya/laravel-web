<?php

namespace App\Http\Controllers;

use App\Models\MutasiAset;
use App\Models\Aset;
use Illuminate\Http\Request;

class MutasiAsetController extends Controller
{
    public function index(Request $request)
    {
        $query = MutasiAset::with('aset');

        // Optional: search by aset name
        if ($request->filled('search')) {
            $query->whereHas('aset', function ($q) use ($request) {
                $q->where('nama_aset', 'like', '%' . $request->search . '%');
            });
        }

        $mutasis = $query->latest()->paginate(10);
        return view('guest.mutasi_aset.index', compact('mutasis'));
    }

    public function create()
    {
        $asets = Aset::all();
        return view('guest.mutasi_aset.create', compact('asets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id',
            'tanggal' => 'required|date',
            'jenis_mutasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ]);

        MutasiAset::create($request->all());

        return redirect()->route('mutasi-aset.index')->with('success', 'Data mutasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mutasi = MutasiAset::findOrFail($id);
        $asets = Aset::all();
        return view('guest.mutasi_aset.edit', compact('mutasi', 'asets'));
    }

    public function update(Request $request, $id)
    {
        $mutasi = MutasiAset::findOrFail($id);

        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id',
            'tanggal' => 'required|date',
            'jenis_mutasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ]);

        $mutasi->update($request->all());

        return redirect()->route('mutasi-aset.index')->with('success', 'Data mutasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        MutasiAset::findOrFail($id)->delete();
        return back()->with('success', 'Data mutasi berhasil dihapus.');
    }
}
