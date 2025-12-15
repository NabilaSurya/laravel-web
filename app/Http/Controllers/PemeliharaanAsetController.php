<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemeliharaanAset;
use App\Models\Aset;

class PemeliharaanAsetController extends Controller
{
    public function index()
    {
        $pemeliharaans = PemeliharaanAset::orderBy('created_at', 'desc')->get();
        return view('guest.pemeliharaan_aset.index', compact('pemeliharaans'));
    }

    public function create()
    {
        $asets = Aset::all();
        return view('guest.pemeliharaan_aset.create', compact('asets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id',
            'tanggal' => 'required|date',
            'jenis_pemeliharaan' => 'required|string|max:255',
            'tindakan' => 'required|string|max:255',
            'pelaksana' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,png|max:2048'
        ]);

        // Simpan data pemeliharaan
        $pemeliharaan = PemeliharaanAset::create([
            'aset_id' => $request->aset_id,
            'tanggal' => $request->tanggal,
            'jenis_pemeliharaan' => $request->jenis_pemeliharaan,
            'tindakan' => $request->tindakan,
            'pelaksana' => $request->pelaksana,
            'keterangan' => $request->keterangan,
        ]);

        // Jika ada foto, simpan ke media
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('pemeliharaan', 'public');
            $pemeliharaan->media()->create([
                'ref_table' => 'pemeliharaan_aset',
                'file_name' => $path,
                'file_type' => $request->file('foto')->getClientMimeType()
            ]);
        }

        return redirect()->route('pemeliharaan-aset.index')->with('success', 'Data pemeliharaan berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $data = PemeliharaanAset::findOrFail($id);
        $asets = Aset::all();
        return view('guest.pemeliharaan_aset.edit', compact('data', 'asets'));
    }

    public function update(Request $request, $id)
    {
        $pemeliharaan = PemeliharaanAset::findOrFail($id);

        $request->validate([
            'aset_id' => 'required|exists:aset,aset_id',
            'tanggal' => 'required|date',
            'jenis_pemeliharaan' => 'required|string|max:255',
            'tindakan' => 'required|string|max:255',
            'pelaksana' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,png|max:2048'
        ]);

        // Update data pemeliharaan tanpa foto
        $pemeliharaan->update([
            'aset_id' => $request->aset_id,
            'tanggal' => $request->tanggal,
            'jenis_pemeliharaan' => $request->jenis_pemeliharaan,
            'tindakan' => $request->tindakan,
            'pelaksana' => $request->pelaksana,
            'keterangan' => $request->keterangan,
        ]);

        // Jika ada foto baru, simpan di media
        if ($request->hasFile('foto')) {
            // Hapus media lama jika ada
            $pemeliharaan->media()->delete();

            // Simpan foto baru
            $path = $request->file('foto')->store('pemeliharaan', 'public');
            $pemeliharaan->media()->create([
                'ref_table' => 'pemeliharaan_aset',
                'file_name' => $path,
                'file_type' => $request->file('foto')->getClientMimeType(),
            ]);
        }

        return redirect()->route('pemeliharaan-aset.index')->with('success', 'Data pemeliharaan berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $data = PemeliharaanAset::findOrFail($id);
        $data->delete();
        return redirect()->route('pemeliharaan-aset.index')->with('success', 'Data pemeliharaan berhasil dihapus.');
    }
}
