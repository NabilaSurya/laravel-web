@extends('layouts.guest.app')

@section('content')
    <div class="max-w-xl mx-auto px-6 py-10">
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-bold mb-6 flex items-center gap-2">
                <i class="fa fa-plus text-green-600"></i> Tambah Lokasi Aset
            </h2>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg p-3 mb-4">
                    <ul class="list-disc ps-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('lokasi-aset.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="text-sm font-medium">Aset</label>
                    <select name="aset_id" class="w-full border rounded-lg p-2" required>
                        <option value="">-- Pilih Aset --</option>
                        @foreach ($asets as $aset)
                            <option value="{{ $aset->aset_id }}" @selected(old('aset_id') == $aset->aset_id)>
                                {{ $aset->nama_aset }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="text-sm font-medium">Lokasi</label>
                    <input type="text" name="lokasi_text" value="{{ old('lokasi_text') }}"
                        class="w-full border rounded-lg p-2" placeholder="Contoh: Balai Desa" required>
                </div>

                <div class="mb-6">
                    <label class="text-sm font-medium">Foto Lokasi</label>
                    <input type="file" name="foto" class="w-full mt-1" accept="image/*">
                    <p class="text-xs text-gray-500 mt-1">JPG / PNG, maksimal 2MB</p>
                </div>

                <div class="flex justify-end">
                    <button class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
