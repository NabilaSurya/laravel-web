@extends('layouts.guest.app')

@section('title', 'Data Mutasi Aset')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-12">

        {{-- === Header Halaman === --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-10 border-b pb-4">
            <h2 class="text-3xl font-extrabold text-slate-800 flex items-center gap-3">
                <i class="fa fa-exchange-alt text-blue-600"></i>
                Data Mutasi Aset
            </h2>

            {{-- Tombol Tambah --}}
            <a href="{{ route('mutasi-aset.create') }}"
                class="mt-4 md:mt-0 bg-blue-600 text-white px-5 py-2.5 rounded-full text-base font-medium hover:bg-blue-700 transition duration-300 shadow-md hover:shadow-lg">
                <i class="fa fa-plus mr-1"></i> Tambah Mutasi
            </a>
        </div>
        {{-- === END Header Halaman === --}}

        {{-- === Form Pencarian & Filter === --}}
        <div class="mb-8 flex justify-end">
            <form method="GET" class="flex w-full max-w-sm gap-3">
                <input type="text" name="search" placeholder="Cari berdasarkan nama aset..."
                    value="{{ request('search') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm py-2">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition font-semibold">
                    Cari
                </button>
            </form>
        </div>
        {{-- === END Form Pencarian === --}}


        {{-- === Card Grid Mutasi Aset === --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse ($mutasis as $m)
                {{-- === Card Mutasi === --}}
                <div
                    class="bg-white rounded-xl shadow-xl hover:shadow-2xl transition duration-300 overflow-hidden border border-gray-100 transform hover:-translate-y-1">

                    <div class="p-5">

                        {{-- Judul Aset --}}
                        <h3 class="font-bold text-xl text-gray-800 truncate mb-2" title="{{ $m->aset->nama_aset }}">
                            {{ $m->aset->nama_aset }}
                        </h3>

                        {{-- Jenis Mutasi (Badge Warna) --}}
                        <span
                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                            @if ($m->jenis_mutasi == 'Pemindahan') bg-yellow-100 text-yellow-800
                            @elseif($m->jenis_mutasi == 'Penghapusan') bg-red-100 text-red-800
                            @else bg-green-100 text-green-800 @endif">
                            {{ $m->jenis_mutasi }}
                        </span>

                        <hr class="my-4">

                        {{-- Detail Mutasi --}}
                        <div class="space-y-2 text-sm text-gray-700">
                            <p class="flex items-center">
                                <i class="fa fa-calendar-alt text-blue-500 w-5 mr-2"></i>
                                <span class="font-semibold">Tanggal:</span>
                                {{ \Carbon\Carbon::parse($m->tanggal)->translatedFormat('d F Y') }}
                            </p>
                            <p class="flex items-start">
                                <i class="fa fa-info-circle text-gray-500 w-5 mr-2 mt-1"></i>
                                <span class="font-semibold">ID Mutasi:</span> {{ $m->mutasi_id }}
                            </p>
                            <p class="text-xs italic text-gray-500 pt-2 border-t mt-2">
                                Keterangan: {{ Str::limit($m->keterangan, 70) }}
                            </p>
                        </div>

                        {{-- === Aksi (Icon Button) === --}}
                        <div class="flex justify-end gap-3 pt-4 border-t mt-4">

                            {{-- Edit Button --}}
                            <a href="{{ route('mutasi-aset.edit', $m->mutasi_id) }}"
                                class="w-8 h-8 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200 transition"
                                title="Edit Mutasi">
                                <i class="fa fa-edit text-sm"></i>
                            </a>

                            {{-- Delete Button --}}
                            <form action="{{ route('mutasi-aset.destroy', $m->mutasi_id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data mutasi aset ID: {{ $m->mutasi_id }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition"
                                    title="Hapus Mutasi">
                                    <i class="fa fa-trash-alt text-sm"></i>
                                </button>
                            </form>
                        </div>
                        {{-- === END Aksi === --}}
                    </div>

                </div>
                {{-- === END Card Mutasi === --}}
            @empty
                {{-- Empty Placeholder --}}
                <div
                    class="col-span-full text-center py-20 bg-white rounded-xl shadow-xl border border-dashed border-gray-300">
                    <i class="fa fa-exclamation-circle text-6xl mb-4 text-red-400"></i>
                    <p class="text-xl font-semibold">Tidak ada data mutasi aset yang ditemukan.</p>
                    <p class="mt-2 text-sm text-gray-500">Coba ubah kata kunci pencarian Anda atau tambahkan data mutasi
                        baru.</p>
                </div>
            @endforelse
        </div>
        {{-- === END Card Grid === --}}

        {{-- === Pagination === --}}
        <div class="mt-8">
            {{ $mutasis->links() }}
        </div>
        {{-- === END Pagination === --}}

    </div>
@endsection
