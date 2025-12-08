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
            <div class="mb-6 p-4 border rounded-xl bg-gray-50/50">
                <form method="GET" action="{{ route('aset.index') }}">
                    <div class="flex flex-wrap items-end gap-3">

                        {{-- 🔎 Search Aset dengan Tombol Clear --}}
                        <div class="flex-grow max-w-sm">
                            <label for="search" class="text-gray-600 text-xs font-semibold block mb-1">Cari Aset</label>
                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden bg-white">
                                <input type="text" name="search" id="search"
                                    class="w-full px-3 py-2 text-sm focus:ring-0 focus:outline-none border-none"
                                    value="{{ request('search') }}" placeholder="Nama atau kode aset...">

                                <button type="submit" class="p-2 bg-gray-100 hover:bg-gray-200 text-gray-500 transition">
                                    <i class="fa fa-search text-sm"></i>
                                </button>
                            </div>

                            {{-- Tombol Clear Search (Di bawah input) --}}
                            @if (request('search'))
                                <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                    class="text-xs text-red-500 hover:text-red-700 font-medium mt-1 float-right">
                                    Hapus Pencarian
                                </a>
                            @endif
                        </div>

                        {{-- 🏷️ Filter Kategori (Auto Submit) --}}
                        <div class="w-full sm:w-auto min-w-[150px]">
                            <label for="kategori" class="text-gray-600 text-xs font-semibold block mb-1">Kategori</label>
                            <select name="kategori" id="kategori"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-700 focus:ring-blue-500 focus:border-blue-500 transition"
                                onchange="this.form.submit()">
                                <option value="">Semua</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->kategori_id }}"
                                        {{ request('kategori') == $k->kategori_id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- 📅 Tanggal Mulai --}}
                        <div class="w-full sm:w-auto min-w-[150px]">
                            <label for="tanggal_mulai" class="text-gray-600 text-xs font-semibold block mb-1">Dari
                                Tanggal</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-700 focus:ring-blue-500 focus:border-blue-500 transition"
                                value="{{ request('tanggal_mulai') }}">
                        </div>

                        {{-- 📅 Tanggal Akhir --}}
                        <div class="w-full sm:w-auto min-w-[150px]">
                            <label for="tanggal_akhir" class="text-gray-600 text-xs font-semibold block mb-1">Sampai
                                Tanggal</label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-700 focus:ring-blue-500 focus:border-blue-500 transition"
                                value="{{ request('tanggal_akhir') }}">
                        </div>

                        {{-- Tombol Aksi (Filter Manual & Reset) --}}
                        <div class="flex gap-2 self-end mt-2 md:mt-0">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-md transition whitespace-nowrap">
                                <i class="fa fa-funnel-dollar mr-1"></i> Filter
                            </button>
                            <a href="{{ route('aset.index') }}"
                                class="border border-gray-300 hover:bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm font-semibold transition whitespace-nowrap">
                                <i class="fa fa-redo-alt mr-1"></i> Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mt-3">
                {{ $asets->links() }}
            </div>
            <div class="mt-10"></div>

            <div id="cardGridAset" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($asets as $aset)
                    <div
                        class="asset-card bg-white p-4 rounded-xl shadow-md border-t-4 border-blue-600 transition hover:shadow-lg relative hover:scale-[1.02] duration-200">
                        {{-- FOTO ASET --}}
                        @if ($aset->foto)
                            <img src="{{ asset('storage/' . $aset->foto) }}"
                                class="w-full h-40 object-cover rounded-lg mb-3" alt="Foto Aset {{ $aset->nama_aset }}">
                        @else
                            <div class="w-full h-40 bg-gray-200 flex items-center justify-center rounded-lg mb-3">
                                <i class="fa fa-image text-gray-400 text-3xl"></i>
                            </div>
                        @endif

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
