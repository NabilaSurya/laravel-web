@extends('layouts.guest.app')

@section('content')
    {{-- PERUBAHAN: Menambahkan pt-24 (Padding Top) untuk mengatasi header fixed --}}
    <div class="w-full px-6 py-6 mx-auto pt-24">

        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div class="p-4 mb-4 text-white bg-green-500 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white shadow-xl rounded-2xl bg-clip-border">

                    {{-- HEADER --}}
                    <div class="p-6 pb-0 mb-0 border-b rounded-t-2xl flex justify-between items-center">
                        <h6 class="text-lg font-semibold text-slate-700">Daftar Data Warga</h6>
                        <a href="{{ route('warga.create') }}"
                            class="px-4 py-2 text-xs font-bold text-white uppercase bg-blue-500 rounded-lg shadow-md hover:-translate-y-px transition-all">
                            <i class="fa fa-plus mr-1"></i> Tambah Warga
                        </a>
                    </div>

                    {{-- GRID CARD --}}
                    <div class="flex-auto p-6">
                        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                            @forelse ($wargas as $warga)
                                <div
                                    class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 ease-in-out border border-gray-100 hover:-translate-y-1">
                                    <div class="p-6">
                                        {{-- Avatar + Info Utama --}}
                                        <div class="flex items-center mb-4 space-x-4">
                                            <div
                                                class="h-14 w-14 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-lg font-bold shadow-md">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-base font-semibold text-slate-800">{{ $warga->nama }}</h4>
                                                <p class="text-xs text-gray-500">NIK: {{ $warga->nik }}</p>
                                            </div>
                                        </div>

                                        {{-- Detail Kecil seperti Tag --}}
                                        <div class="flex flex-wrap gap-2 mb-4">
                                            <span
                                                class="px-2 py-0.5 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                                {{ $warga->jenis_kelamin }}
                                            </span>

                                            @if ($warga->no_hp)
                                                <span
                                                    class="px-2 py-0.5 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                                    <i class="fa fa-phone mr-1"></i> {{ $warga->no_hp }}
                                                </span>
                                            @endif

                                            <span
                                                class="px-2 py-0.5 text-xs font-medium rounded-full bg-purple-100 text-purple-800"
                                                title="{{ $warga->alamat }}">
                                                <i class="fa fa-map-marker mr-1"></i>
                                                {{ Str::limit($warga->alamat, 25, '...') }}
                                            </span>
                                        </div>

                                        {{-- Tombol Aksi --}}
                                        <div class="flex justify-between pt-3 border-t border-gray-100">
                                            <a href="{{ route('warga.edit', $warga->id) }}"
                                                class="text-xs font-semibold text-blue-600 hover:text-blue-800 transition-colors">
                                                <i class="fa fa-edit mr-1"></i> Edit
                                            </a>
                                            <form action="{{ route('warga.destroy', $warga->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin hapus data warga {{ $warga->nama }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-xs font-semibold text-red-600 hover:text-red-800 transition-colors">
                                                    <i class="fa fa-trash mr-1"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="w-full text-center py-10 sm:col-span-2 lg:col-span-3">
                                    <p class="text-base text-slate-500">Belum ada data Warga yang tercatat.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
