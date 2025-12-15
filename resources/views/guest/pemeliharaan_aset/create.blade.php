@extends('layouts.guest.app')

@section('title', 'Tambah Pemeliharaan Aset')

@section('content')
    <div class="max-w-4xl mx-auto px-6 py-12">

        {{-- Card Utama dengan Shadow dan Border yang Jelas --}}
        <div class="bg-white shadow-2xl rounded-xl p-8 border border-gray-100">

            {{-- Header Form --}}
            <div class="mb-8 pb-4 border-b border-gray-200">
                <h2 class="text-2xl font-extrabold text-slate-800 flex items-center gap-3">
                    {{-- Icon: Diubah menjadi fa-plus-circle dengan warna Biru --}}
                    <i class="fa fa-plus-circle text-blue-600"></i>
                    Tambah Pemeliharaan Aset
                </h2>
                <p class="text-sm text-gray-500 mt-1">Masukkan detail pemeliharaan aset yang baru.</p>
            </div>

            <form method="POST" action="{{ route('pemeliharaan-aset.store') }}" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                {{-- Grouping Input dalam Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                    {{-- Pilih Aset --}}
                    <div>
                        <label for="aset_id" class="block text-sm font-bold text-gray-700 mb-1">Pilih Aset</label>
                        <select name="aset_id" id="aset_id" required
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                            <option value="">-- Pilih Aset --</option>
                            @foreach ($asets as $aset)
                                <option value="{{ $aset->aset_id }}">{{ $aset->nama_aset }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tanggal Pemeliharaan --}}
                    <div>
                        <label for="tanggal" class="block text-sm font-bold text-gray-700 mb-1">Tanggal
                            Pemeliharaan</label>
                        <input type="date" name="tanggal" id="tanggal" required
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                    </div>

                    {{-- Jenis Pemeliharaan --}}
                    <div>
                        <label for="jenis_pemeliharaan" class="block text-sm font-bold text-gray-700 mb-1">Jenis
                            Pemeliharaan</label>
                        <input type="text" name="jenis_pemeliharaan" id="jenis_pemeliharaan"
                            placeholder="Contoh: Servis rutin, perbaikan" required
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                    </div>

                    {{-- Tindakan --}}
                    <div>
                        <label for="tindakan" class="block text-sm font-bold text-gray-700 mb-1">Tindakan</label>
                        <input type="text" name="tindakan" id="tindakan"
                            placeholder="Contoh: Perbaikan mesin, pengecatan" required
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                    </div>

                    {{-- Pelaksana (Full Width) --}}
                    <div class="col-span-1 md:col-span-2">
                        <label for="pelaksana" class="block text-sm font-bold text-gray-700 mb-1">Pelaksana</label>
                        <input type="text" name="pelaksana" id="pelaksana" placeholder="Nama pelaksana" required
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                    </div>

                    {{-- Keterangan (Full Width) --}}
                    <div class="col-span-1 md:col-span-2">
                        <label for="keterangan" class="block text-sm font-bold text-gray-700 mb-1">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="4" placeholder="Catatan tambahan (opsional)"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"></textarea>
                    </div>

                    {{-- Upload Foto Dokumentasi (Full Width) --}}
                    <div class="col-span-1 md:col-span-2 pt-4 border-t border-gray-200">
                        <label for="foto" class="block text-sm font-bold text-gray-700 mb-1">Foto Dokumentasi</label>
                        <input type="file" name="foto" id="foto"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition duration-300">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Max 2MB.</p>
                    </div>

                </div>

                {{-- Action --}}
                <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('pemeliharaan-aset.index') }}"
                        class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition">Batal</a>
                    <button type="submit"
                        class="px-6 py-2.5 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 shadow-lg transition">
                        <i class="fa fa-save mr-1"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
