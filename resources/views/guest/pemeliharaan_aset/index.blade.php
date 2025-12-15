@extends('layouts.guest.app')

@section('title', 'Pemeliharaan Aset')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-12">

        {{-- === Header Halaman === --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-10 border-b pb-4">
            <h2 class="text-3xl font-extrabold text-slate-800 flex items-center gap-3">
                {{-- ICON: Warna Biru --}}
                <i class="fa fa-tools text-blue-600"></i>
                Data Pemeliharaan Aset
            </h2>

            {{-- Tombol Tambah: Warna Biru --}}
            <a href="{{ route('pemeliharaan-aset.create') }}"
                class="mt-4 md:mt-0 bg-blue-600 text-white px-5 py-2.5 rounded-full text-base font-medium hover:bg-blue-700 transition duration-300 shadow-md hover:shadow-lg">
                <i class="fa fa-plus mr-1"></i> Tambah Pemeliharaan
            </a>
        </div>
        {{-- === END Header Halaman === --}}

        {{-- Card Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            @forelse ($pemeliharaans as $item)
                {{-- === Card Pemeliharaan Aset === --}}
                <div
                    class="bg-white rounded-xl shadow-xl hover:shadow-2xl transition duration-300 overflow-hidden border border-gray-100 transform hover:-translate-y-1">

                    {{-- Foto Pemeliharaan --}}
                    <div class="w-full h-48 bg-gray-100 overflow-hidden">
                        <img src="{{ $item->media->first() ? asset('storage/' . $item->media->first()->file_name) : asset('assets/img/des.jpg') }}"
                            alt="Foto Pemeliharaan"
                            class="h-full w-full object-cover transform hover:scale-105 transition duration-500">
                    </div>

                    {{-- Content --}}
                    <div class="p-5">
                        <h3 class="font-bold text-slate-800 text-xl truncate mb-1" title="{{ $item->aset->nama_aset }}">
                            {{ $item->aset->nama_aset }}
                        </h3>

                        {{-- Jenis Pemeliharaan & Tanggal --}}
                        <p class="text-sm text-gray-700 mt-2 flex items-center">
                            {{-- Ikon Wrench: Warna Biru --}}
                            <i class="fa fa-wrench text-blue-500 mr-2"></i>
                            <span class="font-semibold">{{ $item->jenis_pemeliharaan }}</span>
                        </p>

                        <p class="text-xs text-gray-500 mt-1 flex items-center">
                            <i class="fa fa-calendar-alt mr-2"></i>
                            Tanggal: {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                        </p>

                        @if ($item->keterangan)
                            <p class="text-xs text-gray-500 mt-3 italic bg-gray-50 p-2 rounded">
                                {{ Str::limit($item->keterangan, 80) }}
                            </p>
                        @endif

                        {{-- Action (Diubah menjadi Icon Button) --}}
                        <div class="flex justify-end gap-3 pt-4 border-t mt-4">

                            {{-- Edit Button --}}
                            <a href="{{ route('pemeliharaan-aset.edit', $item->pemeliharaan_id) }}"
                                class="w-8 h-8 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200 transition"
                                title="Edit Data">
                                <i class="fa fa-edit text-sm"></i>
                            </a>

                            {{-- Delete Button (Warna Merah tetap untuk aksi hapus) --}}
                            <form method="POST" action="{{ route('pemeliharaan-aset.destroy', $item->pemeliharaan_id) }}"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pemeliharaan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition"
                                    title="Hapus Data">
                                    <i class="fa fa-trash-alt text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- === END Card Pemeliharaan Aset === --}}
            @empty
                {{-- Empty Placeholder --}}
                <div
                    class="col-span-full text-center py-20 bg-white rounded-xl shadow-xl border border-dashed border-gray-300">
                    <i class="fa fa-folder-open text-6xl text-blue-400 mb-4"></i>
                    <h4 class="text-xl font-semibold text-slate-700">Belum ada data pemeliharaan</h4>
                    <p class="mt-2 text-sm text-gray-500">Silakan tambahkan data pemeliharaan aset yang baru.</p>
                </div>
            @endforelse

        </div>
    </div>
@endsection
