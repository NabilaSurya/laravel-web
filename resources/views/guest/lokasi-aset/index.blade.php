@extends('layouts.guest.app')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-12">

        {{-- === Header Halaman === --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-10 border-b pb-4">
            <h2 class="text-3xl font-extrabold text-gray-800 flex items-center gap-3">
                {{-- ICON: Warna Biru --}}
                <i class="fa fa-map-marker-alt text-blue-600"></i> Lokasi Aset Terdaftar
            </h2>

            {{-- Tombol Tambah: Warna Biru --}}
            <a href="{{ route('lokasi-aset.create') }}"
                class="mt-4 md:mt-0 bg-blue-600 text-white px-5 py-2.5 rounded-full text-base font-medium hover:bg-blue-700 transition duration-300 shadow-md hover:shadow-lg">
                <i class="fa fa-plus mr-1"></i> Tambah Lokasi
            </a>
        </div>
        {{-- === END Header Halaman === --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse ($lokasiAsets as $item)
                {{-- === Card Lokasi Aset === --}}
                <div
                    class="bg-white rounded-xl shadow-xl hover:shadow-2xl transition duration-300 overflow-hidden border border-gray-100 transform hover:-translate-y-1">

                    {{-- FOTO ASET --}}
                    @if ($item->fotoUtama)
                        <div class="w-full h-52 bg-gray-100 overflow-hidden">
                            <img src="{{ asset('storage/' . $item->fotoUtama->file_name) }}"
                                alt="Foto Aset {{ $item->aset->nama_aset ?? 'N/A' }}"
                                class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
                        </div>
                    @else
                        <div class="w-full h-52 bg-gray-50 flex flex-col items-center justify-center text-gray-400 p-4">
                            <i class="fa fa-image text-5xl mb-3"></i>
                            <p class="text-sm">Tidak ada foto utama</p>
                        </div>
                    @endif

                    <div class="p-5">
                        {{-- NAMA ASET --}}
                        <h3 class="font-bold text-xl text-gray-800 truncate mb-1"
                            title="{{ $item->aset->nama_aset ?? 'Aset Tidak Diketahui' }}">
                            {{ $item->aset->nama_aset ?? 'Aset [ID: ' . $item->lokasi_id . ']' }}
                        </h3>

                        {{-- DETAIL LOKASI --}}
                        <p class="text-sm text-gray-500 flex items-center mt-2">
                            {{-- ICON: Warna Biru --}}
                            <i class="fa fa-map-pin text-blue-500 mr-2"></i>
                            <span class="truncate" title="{{ $item->lokasi_text }}">{{ $item->lokasi_text }}</span>
                        </p>

                        {{-- === Aksi (Icon Button) === --}}
                        <div class="flex justify-end gap-3 pt-4 border-t mt-4">

                            {{-- Edit Button --}}
                            <a href="{{ route('lokasi-aset.edit', $item->lokasi_id) }}"
                                class="w-8 h-8 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200 transition"
                                title="Edit Lokasi">
                                <i class="fa fa-edit text-sm"></i>
                            </a>

                            {{-- Delete Button (Warna Merah tetap untuk aksi hapus) --}}
                            <form method="POST" action="{{ route('lokasi-aset.destroy', $item->lokasi_id) }}"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data lokasi aset ini? Tindakan ini tidak dapat dibatalkan.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition"
                                    title="Hapus Lokasi">
                                    <i class="fa fa-trash-alt text-sm"></i>
                                </button>
                            </form>
                        </div>
                        {{-- === END Aksi === --}}
                    </div>

                </div>
                {{-- === END Card Lokasi Aset === --}}
            @empty
                {{-- === Placeholder Kosong === --}}
                <div
                    class="col-span-full text-center text-gray-500 py-20 bg-white rounded-xl shadow-xl border border-dashed border-gray-300">
                    <i class="fa fa-folder-open text-6xl mb-4 text-blue-400"></i>
                    <p class="text-xl font-medium">Data lokasi aset belum tersedia.</p>
                    <p class="mt-2 text-sm">Silakan tambahkan data lokasi aset yang baru.</p>
                </div>
                {{-- === END Placeholder Kosong === --}}
            @endforelse
        </div>

    </div>
@endsection
