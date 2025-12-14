<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Publik | Aset Desa</title>

    {{-- Menggunakan include untuk memuat CSS, Font, dan style global --}}
    @include('layouts.guest.css')
</head>

<body class="font-inter bg-indigo-50 text-slate-700">

    {{-- Memuat header fixed/navbar --}}
    @include('layouts.guest.header')

    <section class="relative h-[70vh] flex items-center justify-center text-center overflow-hidden">

        {{-- SLIDESHOW BACKGROUND --}}
        <div id="hero-slideshow" class="absolute inset-0 z-0">
            <div class="hero-slide active" style="background-image: url('{{ asset('assets/img/desa.jpg') }}');"></div>
            <div class="hero-slide" style="background-image: url('{{ asset('assets/img/desa2.jpg') }}');"></div>
            <div class="hero-slide" style="background-image: url('{{ asset('assets/img/desa3.jpg') }}');"></div>
        </div>

        {{-- OVERLAY GELAP --}}
        <div class="absolute inset-0 bg-slate-900/70 z-10"></div>

        {{-- KONTEN HERO --}}
        <div class="relative z-20 px-6">
            <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                Dashboard Publik Aset
            </h2>
            <p class="text-lg text-gray-200 mb-6 max-w-2xl mx-auto">
                Lihat dan kelola kategori aset desa dengan tampilan modern dan interaktif.
            </p>

            <a href="#tabelAset"
                class="inline-flex items-center justify-center w-64 px-4 py-3 font-semibold text-sm rounded-lg
                   bg-blue-500 text-white hover:bg-blue-600 transition shadow-lg">
                <i class="fa fa-list-alt mr-2"></i> Lihat Kategori Aset
            </a>
        </div>

    </section>


    <main>
        <section class="max-w-6xl mx-auto -mt-10 px-6 z-10 relative">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div
                    class="bg-white p-6 rounded-xl shadow-2xl transition hover:shadow-3xl hover:scale-[1.01] duration-300 border-b-4 border-blue-500">
                    <div class="flex items-center justify-between">
                        <h4 class="text-sm font-medium text-gray-500 uppercase">Total Kategori</h4>
                        <i class="fa fa-layer-group text-2xl text-blue-500"></i>
                    </div>
                    {{-- Ganti nilai statis 15 dengan hitungan dari database --}}
                    <p class="text-4xl font-bold text-slate-800 mt-2">{{ count($kategoriAsets ?? []) }}</p>
                    <p class="text-xs text-gray-400 mt-1">Total data</p>
                </div>

                <div
                    class="bg-white p-6 rounded-xl shadow-2xl transition hover:shadow-3xl hover:scale-[1.01] duration-300 border-b-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <h4 class="text-sm font-medium text-gray-500 uppercase">Total Aset (Statik)</h4>
                        <i class="fa fa-boxes text-2xl text-green-500"></i>
                    </div>
                    <p class="text-4xl font-bold text-slate-800 mt-2">5,200</p>
                    <p class="text-xs text-gray-400 mt-1">Peningkatan 12% bulan ini</p>
                </div>

                <div
                    class="bg-white p-6 rounded-xl shadow-2xl transition hover:shadow-3xl hover:scale-[1.01] duration-300 border-b-4 border-amber-500">
                    <div class="flex items-center justify-between">
                        <h4 class="text-sm font-medium text-gray-500 uppercase">Aset Baru (Statik)</h4>
                        <i class="fa fa-truck-loading text-2xl text-amber-500"></i>
                    </div>
                    <p class="text-4xl font-bold text-slate-800 mt-2">87</p>
                    <p class="text-xs text-gray-400 mt-1">Pengadaan: Meja dan Kursi</p>
                </div>

            </div>
        </section>

        <section id="tabelAset" class="max-w-6xl mx-auto mt-16 px-6">
            <div class="bg-white shadow-xl rounded-2xl p-6">
                <div class="flex justify-between items-center mb-6 border-b pb-4">
                    <h3 class="text-xl font-semibold text-slate-800 flex items-center gap-2">
                        <i class="fa fa-tags text-blue-500"></i>
                        Daftar Kategori Aset
                    </h3>
                    {{-- TOMBOL TAMBAH DATA KECIL --}}
                    <a href="{{ route('kategori_aset.create') }}"
                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shadow-md">
                        <i class="fa fa-plus mr-1"></i> Tambah Kategori
                    </a>
                </div>
                {{-- === FILTER AREA (DITAMBAHKAN) === --}}
                <div class="table-responsive mb-6">
                    <form method="GET" action="{{ route('guest.index') }}" onchange="this.form.submit()"
                        class="mb-3">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            {{-- Filter Kode --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1">Filter Kode</label>
                                <select name="kode" class="form-select w-full rounded-lg border-gray-300"
                                    onchange="this.form.submit()">
                                    <option value="">Semua Kode</option>

                                    @foreach ($allKode as $kode)
                                        <option value="{{ $kode }}"
                                            {{ request('kode') == $kode ? 'selected' : '' }}>
                                            {{ $kode }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Search Input --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1">Cari Nama/Kode</label>
                                <div class="input-group flex">
                                    <input type="text" name="search"
                                        class="form-control w-full rounded-lg border-gray-300" placeholder="Search..."
                                        value="{{ request('search') }}">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-2 py-1.5 rounded-lg ml-2 font-semibold">
                                        Cari
                                    </button>
                                </div>
                            </div>

                            {{-- Tombol Reset --}}
                            <div class="flex items-end">
                                <a href="{{ route('kategori_aset.index') }}"
                                    class="w-full bg-gray-200 text-gray-600 text-sm py-2 rounded-lg text-center font-semibold hover:bg-gray-300 transition">
                                    Reset Filter
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- === END FILTER === --}}

                <div class="mb-10">
                    {{ $kategoriAsets->links('pagination::tailwind') }}
                </div>

                {{-- **PERUBAHAN KRUSIAL:** Menggunakan Blade Loop untuk menampilkan data DB --}}
                <div id="cardGridKategori" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    @forelse ($kategoriAsets ?? [] as $kategori)
                        <div class="category-card bg-white p-4 rounded-xl shadow-md border-t-4 border-blue-600 transition hover:shadow-lg relative hover:scale-[1.02] duration-200"
                            {{-- Simulasi link ke detail aset --}}
                            onclick="console.log('Navigasi ke detail aset untuk {{ $kategori->nama }}'); window.location.href = '#';">

                            <span class="absolute top-2 right-4 text-xs font-semibold text-gray-400">#ID:
                                {{ $kategori->kategori_id }}</span>
                            <h4 class="text-lg font-bold text-slate-800">{{ $kategori->nama }}</h4>
                            <p class="text-sm text-gray-600 mt-1">Kode: **{{ $kategori->kode }}**</p>

                            @if ($kategori->deskripsi)
                                <p class="text-xs text-gray-500 mt-2 italic">{{ Str::limit($kategori->deskripsi, 60) }}
                                </p>
                            @else
                                <p class="text-xs text-gray-400 mt-2 italic">Tidak ada deskripsi.</p>
                            @endif

                            <div class="mt-4 flex justify-end gap-3 text-xs">
                                {{-- Tombol Edit mengarah ke route edit --}}
                                <a href="{{ route('kategori_aset.edit', $kategori->kategori_id) }}"
                                    class="text-blue-500 hover:text-blue-700 font-medium transition">Edit</a>

                                {{-- Tombol Hapus mengarah ke route destroy --}}
                                <form action="{{ route('kategori_aset.destroy', $kategori->kategori_id) }}"
                                    method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin hapus kategori {{ $kategori->nama }}? Aksi ini tidak dapat dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 font-medium transition">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        {{-- Kartu jika $kategoriAsets kosong --}}
                        <div class="w-full sm:col-span-2 lg:col-span-3">
                            <div
                                class="bg-gray-100 p-8 rounded-xl shadow-inner text-center border-l-4 border-amber-500">
                                <i class="fa fa-exclamation-triangle text-amber-500 text-3xl mb-3"></i>
                                <h4 class="text-lg font-semibold text-slate-800">Data Kategori Aset Kosong</h4>
                                <p class="text-sm text-gray-600 mt-1">Silakan tambahkan data kategori aset baru.</p>
                                <a href="{{ route('kategori_aset.create') }}"
                                    class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition text-xs font-semibold">
                                    Tambah Kategori Pertama
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

    {{-- Memuat script/element tambahan (misalnya, FAB WhatsApp) --}}
    @include('layouts.guest.js')

</body>

</html>
