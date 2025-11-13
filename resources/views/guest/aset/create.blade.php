@extends('layouts.guest.app')

@section('content')
    <div class="container py-4 max-w-6xl mx-auto px-6 mt-10">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white shadow-xl rounded-2xl p-6">
                <div class="mb-6 border-b pb-4">
                    <h3 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <i class="fa fa-plus-circle text-green-500"></i>
                        Form Tambah Aset Baru
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">Isi detail aset baru dan relasikan dengan kategori yang tepat.</p>
                </div>

                <form action="{{ route('aset.store') }}" method="POST">
                    @csrf

                    {{-- KATEGORI ASET (SELECT) --}}
                    <div class="mb-4">
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori Aset <span
                                class="text-red-500">*</span></label>
                        <select
                            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('kategori_id') border-red-500 @enderror"
                            id="kategori_id" name="kategori_id" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->kategori_id }}"
                                    {{ old('kategori_id') == $kat->kategori_id ? 'selected' : '' }}>
                                    {{ $kat->nama }} ({{ $kat->kode }})
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- KODE ASET (INPUT) --}}
                    <div class="mb-4">
                        <label for="kode_aset" class="block text-sm font-medium text-gray-700 mb-1">Kode Aset <span
                                class="text-red-500">*</span></label>
                        <input type="text"
                            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('kode_aset') border-red-500 @enderror"
                            id="kode_aset" name="kode_aset" value="{{ old('kode_aset') }}" required>
                        @error('kode_aset')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- NAMA ASET (INPUT) --}}
                    <div class="mb-4">
                        <label for="nama_aset" class="block text-sm font-medium text-gray-700 mb-1">Nama Aset <span
                                class="text-red-500">*</span></label>
                        <input type="text"
                            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('nama_aset') border-red-500 @enderror"
                            id="nama_aset" name="nama_aset" value="{{ old('nama_aset') }}" required>
                        @error('nama_aset')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- TANGGAL PEROLEHAN (INPUT DATE) --}}
                    <div class="mb-4">
                        <label for="tgl_perolehan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Perolehan
                            <span class="text-red-500">*</span></label>
                        <input type="date"
                            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('tgl_perolehan') border-red-500 @enderror"
                            id="tgl_perolehan" name="tgl_perolehan" value="{{ old('tgl_perolehan') }}" required>
                        @error('tgl_perolehan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- NILAI PEROLEHAN (INPUT NUMBER) --}}
                    <div class="mb-4">
                        <label for="nilai_perolehan" class="block text-sm font-medium text-gray-700 mb-1">Nilai Perolehan
                            (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" step="0.01"
                            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('nilai_perolehan') border-red-500 @enderror"
                            id="nilai_perolehan" name="nilai_perolehan" value="{{ old('nilai_perolehan') }}" required>
                        @error('nilai_perolehan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- KONDISI (SELECT) --}}
                    <div class="mb-6">
                        <label for="kondisi" class="block text-sm font-medium text-gray-700 mb-1">Kondisi <span
                                class="text-red-500">*</span></label>
                        <select
                            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('kondisi') border-red-500 @enderror"
                            id="kondisi" name="kondisi" required>
                            <option value="">-- Pilih Kondisi --</option>
                            @foreach (['Baik', 'Rusak Ringan', 'Rusak Berat'] as $kondisi)
                                <option value="{{ $kondisi }}" {{ old('kondisi') == $kondisi ? 'selected' : '' }}>
                                    {{ $kondisi }}</option>
                            @endforeach
                        </select>
                        @error('kondisi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- BUTTONS --}}
                    <div class="flex justify-end gap-3 pt-4 border-t">
                        <a href="{{ route('aset.index') }}"
                            class="px-4 py-2 text-sm font-semibold text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 transition">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-semibold text-white bg-blue-500 rounded-lg shadow-md hover:bg-blue-600 transition">
                            <i class="fa fa-save mr-1"></i> Simpan Aset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
