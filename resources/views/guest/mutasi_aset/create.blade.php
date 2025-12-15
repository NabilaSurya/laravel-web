@extends('layouts.guest.app')

@section('title', 'Tambah Mutasi Aset')

@section('content')
    <div class="max-w-4xl mx-auto px-6 py-12">

        {{-- Card Utama dengan Shadow dan Border yang Jelas --}}
        <div class="bg-white shadow-2xl rounded-xl p-8 border border-gray-100">

            {{-- Header Form --}}
            <div class="mb-8 pb-4 border-b border-gray-200">
                <h2 class="text-2xl font-extrabold text-slate-800 flex items-center gap-3">
                    <i class="fa fa-plus-circle text-blue-600"></i>
                    Tambah Mutasi Aset
                </h2>
                <p class="text-sm text-gray-500 mt-1">Masukkan data perpindahan atau perubahan status aset yang baru.</p>
            </div>

            <form action="{{ route('mutasi-aset.store') }}" method="POST" class="space-y-6">
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

                    {{-- Tanggal --}}
                    <div>
                        <label for="tanggal" class="block text-sm font-bold text-gray-700 mb-1">Tanggal Mutasi</label>
                        <input type="date" name="tanggal" id="tanggal" required
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                    </div>

                    {{-- Jenis Mutasi (Full Width) --}}
                    <div class="col-span-1 md:col-span-2">
                        <label for="jenis_mutasi" class="block text-sm font-bold text-gray-700 mb-1">Jenis Mutasi</label>
                        <input type="text" name="jenis_mutasi" id="jenis_mutasi"
                            placeholder="Contoh: Pemindahan, Penghapusan, Hibah" required
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                    </div>
                </div>

                {{-- Keterangan (Full Width) --}}
                <div>
                    <label for="keterangan" class="block text-sm font-bold text-gray-700 mb-1">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="4" placeholder="Detail alasan mutasi"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"></textarea>
                </div>

                {{-- Action --}}
                <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('mutasi-aset.index') }}"
                        class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition">Batal</a>
                    <button type="submit"
                        class="px-6 py-2.5 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 shadow-lg transition">
                        <i class="fa fa-save mr-1"></i> Simpan Mutasi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
