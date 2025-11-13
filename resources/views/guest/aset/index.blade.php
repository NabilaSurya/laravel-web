@extends('layouts.guest.app')

@section('content')
    <section id="tabelAset" class="max-w-6xl mx-auto mt-16 px-6">
        <div class="bg-white shadow-xl rounded-2xl p-6">

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg" role="alert">
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="flex justify-between items-center mb-6 border-b pb-4">
                <h3 class="text-xl font-semibold text-slate-800 flex items-center gap-2">
                    <i class="fa fa-clipboard-list text-blue-500"></i>
                    Data Aset Inventaris
                </h3>
                {{-- TOMBOL TAMBAH DATA --}}
                <a href="{{ route('aset.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shadow-md">
                    <i class="fa fa-plus mr-1"></i> Tambah Aset
                </a>
            </div>

            <div id="cardGridAset" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($asets as $aset)
                    <div
                        class="asset-card bg-white p-4 rounded-xl shadow-md border-t-4 border-blue-600 transition hover:shadow-lg relative hover:scale-[1.02] duration-200">

                        <span class="absolute top-2 right-4 text-xs font-semibold text-gray-400">Kode:
                            {{ $aset->kode_aset }}</span>
                        <h4 class="text-lg font-bold text-slate-800">{{ $aset->nama_aset }}</h4>

                        {{-- Data Relasi Kategori --}}
                        <p class="text-xs text-blue-500 font-medium mt-1">
                            Kategori: **{{ $aset->kategori->nama }}**
                        </p>

                        <div class="mt-3 text-sm space-y-1">
                            <p class="text-gray-600">
                                <i class="fa fa-calendar-alt text-gray-400 mr-1"></i>
                                Tgl. Perolehan: {{ \Carbon\Carbon::parse($aset->tgl_perolehan)->format('d F Y') }}
                            </p>
                            <p class="text-gray-600">
                                <i class="fa fa-money-bill-wave text-gray-400 mr-1"></i>
                                Nilai: <span class="font-bold text-green-600">Rp
                                    {{ number_format($aset->nilai_perolehan, 2, ',', '.') }}</span>
                            </p>
                            <p class="flex items-center">
                                <i class="fa fa-heartbeat text-gray-400 mr-1"></i>
                                Kondisi:
                                @php
                                    $badgeColor = match ($aset->kondisi) {
                                        'Baik' => 'bg-green-500',
                                        'Rusak Ringan' => 'bg-amber-500',
                                        'Rusak Berat' => 'bg-red-500',
                                        default => 'bg-gray-500',
                                    };
                                @endphp
                                <span
                                    class="ml-2 px-2 py-0.5 text-xs font-semibold text-white rounded-full {{ $badgeColor }}">
                                    {{ $aset->kondisi }}
                                </span>
                            </p>
                        </div>

                        <div class="mt-4 flex justify-end gap-3 text-xs">
                            {{-- Tombol Edit --}}
                            <a href="{{ route('aset.edit', $aset) }}"
                                class="text-blue-500 hover:text-blue-700 font-medium transition">
                                <i class="fa fa-edit mr-1"></i> Edit
                            </a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('aset.destroy', $aset) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Yakin hapus aset {{ $aset->nama_aset }}? Aksi ini tidak dapat dibatalkan.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium transition">
                                    <i class="fa fa-trash-alt mr-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    {{-- Kartu jika $asets kosong --}}
                    <div class="w-full sm:col-span-2 lg:col-span-3">
                        <div class="bg-gray-100 p-8 rounded-xl shadow-inner text-center border-l-4 border-amber-500">
                            <i class="fa fa-exclamation-triangle text-amber-500 text-3xl mb-3"></i>
                            <h4 class="text-lg font-semibold text-slate-800">Data Aset Kosong</h4>
                            <p class="text-sm text-gray-600 mt-1">Belum ada data aset yang tercatat.</p>
                            <a href="{{ route('aset.create') }}"
                                class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition text-xs font-semibold">
                                Tambah Aset Pertama
                            </a>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
    </main>

    {{-- Memuat footer dan FAB WhatsApp --}}
    @include('layouts.guest.footer')
    @include('layouts.guest.js')
@endsection
